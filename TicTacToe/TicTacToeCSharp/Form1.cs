using System;
using System.Collections.Generic;
using System.ComponentModel;
using System.Data;
using System.Drawing;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using System.Windows.Forms;

namespace TicTacToeCSharp
{
    public partial class Form1 : Form
    {
        bool turn = true; //true = x na redu; false = o na redu
        int counter = 0;

        public Form1()
        {
            InitializeComponent();
            foreach(Control c in Controls)
            {
                try
                {
                    Button b = (Button)c;
                    b.BackColor = SystemColors.Control;
                }
                catch { }
            }
        }

        private void aboutToolStripMenuItem_Click(object sender, EventArgs e)
        {
            MessageBox.Show("By Tomi", "About Tic Tac Toe");
        }

        private void exitToolStripMenuItem_Click(object sender, EventArgs e)
        {
            Application.Exit();
        }

        private void button_click(object sender, EventArgs e)
        {
            Button b = (Button)sender;
            if (turn)
                b.Text = "x";
            else
                b.Text = "o";

            turn = !turn;
            b.Enabled = false;
            counter++;
            IsWinner();
        }

        private void IsWinner() //uvjeti pobjede
        {
            bool IsWinner = false;
            //horizontalni
            if ((A1.Text == A2.Text) && (A2.Text == A3.Text) && (!A1.Enabled))
                IsWinner = true;
            else if ((B1.Text == B2.Text) && (B2.Text == B3.Text) && (!B1.Enabled))
                IsWinner = true;
            else if ((C1.Text == C2.Text) && (C2.Text == C3.Text) && (!C1.Enabled))
                IsWinner = true;
            //vertikalni
            else if ((A1.Text == B1.Text) && (B1.Text == C1.Text) && (!A1.Enabled))
                IsWinner = true;
            else if ((A2.Text == B2.Text) && (B2.Text == C2.Text) && (!A2.Enabled))
                IsWinner = true;
            else if ((A3.Text == B3.Text) && (B3.Text == C3.Text) && (!A3.Enabled))
                IsWinner = true;
            //dijagonalni
            else if ((A1.Text == B2.Text) && (B2.Text == C3.Text) && (!A1.Enabled))
                IsWinner = true;
            else if ((A3.Text == B2.Text) && (B2.Text == C1.Text) && (!A3.Enabled))
                IsWinner = true;


            if (IsWinner) //ima li pobjednika
            {
                DisableButtons();

                String winner = "0";
                if (turn)
                {
                    winner = "O";
                    oWinCount.Text = (Int32.Parse(oWinCount.Text) + 1).ToString(); //povecaj x pobjeda
                }
                else
                {
                    winner = "X";
                    xWinCount.Text = (Int32.Parse(xWinCount.Text) + 1).ToString(); //povecaj o pobjeda
                }

                MessageBox.Show(winner + " has won!", "Game Over!");
            }
            else //nema pobjednika
            {
                if (counter == 9)
                {
                    drawCount.Text = (Int32.Parse(drawCount.Text) + 1).ToString(); //povecaj nerijeseno
                    MessageBox.Show("Draw!", "Game Over!");
                }
            }
        }

        private void DisableButtons() //onemugicvanje interakcije
        {
            foreach (Control c in Controls)
            {
                try
                {
                    Button b = (Button)c;
                    b.Enabled = false;
                }
                catch { }
            }
        }

        private void newGameToolStripMenuItem_Click(object sender, EventArgs e) //nova igra
        {
            turn = true;
            counter = 0;
            foreach (Control c in Controls)
            {
                try
                {
                    Button b = (Button)c;
                    b.Enabled = true;
                    b.Text = "";
                }
                catch { }
            }
        }

        private void button_enter(object sender, EventArgs e) //prikazivanje igraca
        {
            Button b = (Button)sender;
            if (b.Enabled)
            {

                if (turn)
                    b.Text = "x";
                else
                    b.Text = "o";
            }
        }

        private void button_leave(object sender, EventArgs e) //gasenje prikazivanja igraca
        {
            Button b = (Button)sender;
            if (b.Enabled)
            {
                b.Text = "";
            }
        }

        private void resetWinCounterToolStripMenuItem_Click(object sender, EventArgs e) //resetiranje brojaca pobjeda
        {
            oWinCount.Text = "0";
            xWinCount.Text = "0";
            drawCount.Text = "0";
        }

        private void darkToolStripMenuItem_Click(object sender, EventArgs e)
        {
            foreach (Control c in Controls)
            {
                try
                {
                    Button b = (Button)c;
                    b.BackColor = SystemColors.ControlDarkDark;
                    b.ForeColor = Color.Red;
                    b.BackgroundImage = null;
                }
                catch { }
            }
        }

        private void paperToolStripMenuItem_Click(object sender, EventArgs e)
        {
            foreach (Control c in Controls)
            {
                try
                {
                    Button b = (Button)c;
                    b.BackgroundImage = Properties.Resources.seamless_textured_paper_background;
                    b.ForeColor = Color.Black;
                }
                catch { }
            }
        }

        private void defaultToolStripMenuItem_Click(object sender, EventArgs e)
        {
            foreach (Control c in Controls)
            {
                try
                {
                    Button b = (Button)c;
                    b.BackColor = SystemColors.Control;
                    b.ForeColor = Color.Black;
                    b.BackgroundImage = null;
                }
                catch { }
            }
        }
    }
}
