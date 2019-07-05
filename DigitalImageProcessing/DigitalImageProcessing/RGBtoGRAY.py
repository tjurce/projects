import tkinter
import numpy as np
from PIL import Image
from PIL import ImageTk
import tkinter.filedialog as tkFileDialog
import cv2

def ToGray(img):
    img_gray = cv2.cvtColor(img, cv2.COLOR_BGR2GRAY)
    return img_gray