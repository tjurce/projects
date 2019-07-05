import tkinter
import numpy as np
from PIL import Image, ImageOps
from PIL import ImageTk
import tkinter.filedialog as tkFileDialog
import cv2
from matplotlib import pyplot as plt

def PlotHistogram(img):
    slika_gray = cv2.cvtColor(img, cv2.COLOR_BGR2GRAY)
    histogram = cv2.calcHist([slika_gray], [0], None, [256], [0,256])

    plt.hist(slika_gray.ravel(), 256, [0,256])
    plt.title('Histogram slike')
    plt.xlabel('Intenziteti sive boje')
    plt.ylabel('Broj piksela')
    plt.show(block = False)


def Stretch(img):
    img_new = Image.fromarray(img)
    img_new = ImageOps.autocontrast(img_new, cutoff = 0)
    cv_image = np.array(img_new)
    return cv_image


def Equalize(img):
    img_new = Image.fromarray(img)
    img_new = ImageOps.equalize(img_new, mask=None)
    cv_image = np.array(img_new)
    return cv_image