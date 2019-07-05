/*****************************************************************************
 * Ring2Dkernel.c
 *
 * Tomislav Jurèeviæ, Luka Tarabariæ, Marko Æaleta
 *****************************************************************************/
#include <sys\exception.h>
#include <cdefBF533.h>
#include "sysreg.h"
#include "ccblkfn.h"
#include "math.h"
#include "stdio.h"


void inicijalizacija_EBIU(void);
void postavi_SCLK_54MHz(void);
void Init_SDRAM(void);

void convolve2D(unsigned char* in, unsigned char* out, int data_size_X, int data_size_Y,
                    float* kernel, int kernel_x, int kernel_y);

#define columns 128 // sirina slike u pikselima
#define rows 128 // visina slike u pikselima

// velicina kernela
#define kx 5
#define ky 5

//globalne varijable
unsigned char *image, *filtered; //adrese za ucitavanje originalne i filtrirane slike

//kernel
float kernel[25] = {
	0, 0, 0.1061033, 0, 0,
	0, 0.1061033, 0.1061033, 0.1061033, 0,
	0.1061033, 0.1061033, 0, 0.1061033, 0.1061033,
	0, 0.1061033, 0.1061033, 0.1061033, 0,
	0, 0, 0.1061033, 0, 0
};


int main( void )
{
	sysreg_write(reg_SYSCFG, 0x32);		//Initialize System Configuration Register
	postavi_SCLK_54MHz();
	inicijalizacija_EBIU();
	Init_SDRAM();
	
	image = 0; //adresa originalne slike
	filtered = 0xfff00; //adresa filtrirane slike
	
	
	//poziv funkcije za racunanje konvolucije
	convolve2D(image, filtered, 128, 128, kernel, 5, 5);

	return 0;
}

/* funkcija racuna 2D konvoluciju slike
 * funkcija prima 7 argumenata:
 *   - unsigned char* in pokazuje na adresu filtrirane slike
 *   - unsigned char* out pokazuje na adresu originalne slike
 *   - int dataSizeX broj stupaca slike
 *   - int dataSizeY broj redova slike
 *   - float* kernel pokazuje na kernel (u ovom slucaju Ring2DKernel)
 *   - int kernelSizeX broj stupaca kernela
 *   - int kernelSizeY broj redova kernela
*/
void convolve2D(unsigned char* in, unsigned char* out, int dataSizeX, int dataSizeY,
                    float* kernel, int kernelSizeX, int kernelSizeY)
{
    int i, j, m, n, mm, nn;
    int kCenterX, kCenterY; // centralni element kernela
    float sum;     			// temp accumulation buffer
    int rowIndex, colIndex;

    // find center position of kernel (half of kernel size)
    kCenterX = kernelSizeX / 2;
    kCenterY = kernelSizeY / 2;

    for(i=0; i < dataSizeY; ++i)                // prolazak kroz redove slike
    {
        for(j=0; j < dataSizeX; ++j)            // prolazak kroz stupce slike
        {
            sum = 0;                            // inicijalizacija sume na 0
            for(m=0; m < kernelSizeY; ++m)      // prolazak kroz redove kernela
            {
                mm = kernelSizeY - 1 - m;       // indeks reda okrenutog kernela

                for(n=0; n < kernelSizeX; ++n)  // prolazak kroz stupce kernela
                {
                    nn = kernelSizeX - 1 - n;   // indeks stupca okrenutog kernela

                    // indeksi ulaznog signala, korišteni za provjeru granica
                    rowIndex = i + (kCenterY - mm);
                    colIndex = j + (kCenterX - nn);

                    // provjera jesu li elementi unutar granica
                    if(rowIndex >= 0 && rowIndex < dataSizeY && colIndex >= 0 && colIndex < dataSizeX)
                        sum += in[dataSizeX * rowIndex + colIndex] * kernel[kernelSizeX * mm + nn];
                }
            }
            out[dataSizeX * i + j] = (unsigned char)((float)fabs(sum) + 0.5f);
        }
    }
}


void inicijalizacija_EBIU(void){
	/* flash memorija spojena je na procesor preko EBIU sabirnice, ova 
	funkcija definira njen nacin rada (na nasim vjezbama ce to biti 
	uvijek iste vrijednosti) */
	*pEBIU_AMBCTL0	= 0x7bb07bb0;
	*pEBIU_AMBCTL1	= 0x7bb07bb0;
	*pEBIU_AMGCTL	= 0x000f;
}

void postavi_SCLK_54MHz(void)
{
	*pPLL_DIV = 5;
	*pPLL_CTL = 0x1400;
	
}

//SDRAM Setup
void Init_SDRAM(void)
{
	if (*pEBIU_SDSTAT & SDRS) {
		//SDRAM Refresh Rate Control Register
		//*pEBIU_SDRRC = 0x00000817;	
		*pEBIU_SDRRC = 0x0000019c;	

		//SDRAM Memory Bank Control Register
		*pEBIU_SDBCTL = 0x00000013;
		// ili moze ic:
		*pEBIU_SDBCTL = 0x00000025;

		//SDRAM Memory Global Control Register	
		*pEBIU_SDGCTL = 0x0091998d;	

		ssync();
	}
}//end Init_SDRAM
