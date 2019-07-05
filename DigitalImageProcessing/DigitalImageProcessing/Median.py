import tkinter
import numpy as np
from PIL import Image
from PIL import ImageTk
import tkinter.filedialog as tkFileDialog
import cv2

def Median(img):
    medianImg = cv2.medianBlur(img, 5)
    return medianImg