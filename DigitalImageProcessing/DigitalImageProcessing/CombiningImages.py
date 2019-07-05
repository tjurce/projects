import numpy as np
import cv2
from tkinter import *
import tkinter.filedialog as tkFileDialog

def Combine(img1):
    path2 = tkFileDialog.askopenfilename()

    img2 = cv2.imread(path2)
    
    img1 = img1.astype('float')
    img2 = img2.astype('float')
    combinedImageF = (img1+img2)/2
    combinedImage = combinedImageF.astype('uint8')

    return combinedImage