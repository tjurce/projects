<<<<<<< HEAD
import tkinter
import numpy as np
from PIL import Image
from PIL import ImageTk
import tkinter.filedialog as tkFileDialog
import cv2
import math

#Primjena gradijenta pomoću Sobelovih filtera po x i y osi
def Gradient(img):
    ddepth = cv2.CV_32F
    dx = cv2.Sobel(img, ddepth, 1, 0)
    dy = cv2.Sobel(img, ddepth, 0, 1)
    dxabs = cv2.convertScaleAbs(dx)
    dyabs = cv2.convertScaleAbs(dy)
    mag = cv2.addWeighted(dxabs, 0.5, dyabs, 0.5, 0)
=======
import tkinter
import numpy as np
from PIL import Image
from PIL import ImageTk
import tkinter.filedialog as tkFileDialog
import cv2
import math

#Primjena gradijenta pomoću Sobelovih filtera po x i y osi
def Gradient(img):
    ddepth = cv2.CV_32F
    dx = cv2.Sobel(img, ddepth, 1, 0)
    dy = cv2.Sobel(img, ddepth, 0, 1)
    dxabs = cv2.convertScaleAbs(dx)
    dyabs = cv2.convertScaleAbs(dy)
    mag = cv2.addWeighted(dxabs, 0.5, dyabs, 0.5, 0)
>>>>>>> 5182916d9ebe06982fee53051a802908c9b75cb2
    return mag