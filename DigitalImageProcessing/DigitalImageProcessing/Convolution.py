import tkinter
import numpy as np
from PIL import Image
from PIL import ImageTk
import tkinter.filedialog as tkFileDialog
import cv2

def Convo(img):
    #unos filtera
    size = input("What is number of rows and columns in matrix")
    matrix_size = int(size)
    print(matrix_size)

    my_filter = np.zeros((matrix_size, matrix_size), np.float32)
    print(my_filter)
    for i in range(0, matrix_size):
        for j in range(0, matrix_size):
            print("unesi element u matricu na mjesto ", i+1, ",", j+1)
            my_filter[i, j] = input()
            print(my_filter)
    
    print()
    print(my_filter)

    filteredImage = cv2.filter2D(img, -1, my_filter, anchor=(-1,-1), borderType=cv2.BORDER_CONSTANT)

    return filteredImage