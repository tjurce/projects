<<<<<<< HEAD
import tkinter
import numpy as np
from PIL import Image
from PIL import ImageTk
import tkinter.filedialog as tkFileDialog
import cv2

def Median(img):
    medianImg = cv2.medianBlur(img, 5)
=======
import tkinter
import numpy as np
from PIL import Image
from PIL import ImageTk
import tkinter.filedialog as tkFileDialog
import cv2

def Median(img):
    medianImg = cv2.medianBlur(img, 5)
>>>>>>> 5182916d9ebe06982fee53051a802908c9b75cb2
    return medianImg