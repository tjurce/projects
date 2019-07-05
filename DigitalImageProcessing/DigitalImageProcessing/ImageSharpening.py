<<<<<<< HEAD
from tkinter import *
import tkinter
import numpy as np
from PIL import Image
from PIL import ImageTk
import tkinter.filedialog as tkFileDialog
import cv2
import keyboard

global my_filter
global filter_image
global img2

def Sharpen(img):
    global filter_image
    global my_filter
    global img2
    
    img2 = img

    #definiranje 3 različita filtra
    my_filter = []

    filter1 = np.ones((3, 3), np.float32)
    filter1[0, 0] = 0
    filter1[0, 1] = -1
    filter1[0, 2] = 0
    filter1[1, 0] = -1
    filter1[1, 1] = 5
    filter1[1, 2] = -1
    filter1[2, 0] = 0
    filter1[2, 1] = -1
    filter1[2, 2] = 0
    my_filter.append(filter1)

    filter2 = np.ones((3, 3), np.float32)
    filter2[0, 0] = -1
    filter2[0, 1] = -1
    filter2[0, 2] = -1
    filter2[1, 0] = -1
    filter2[1, 1] = 5
    filter2[1, 2] = -1
    filter2[2, 0] = -1
    filter2[2, 1] = -1
    filter2[2, 2] = -1
    my_filter.append(filter2)

    filter3 = np.ones((3, 3), np.float32)
    filter3[0, 0] = -1
    filter3[0, 1] = -1
    filter3[0, 2] = -1
    filter3[1, 0] = -1
    filter3[1, 1] = 16
    filter3[1, 2] = -1
    filter3[2, 0] = -1
    filter3[2, 1] = -1
    filter3[2, 2] = -1
    my_filter.append(filter3)

    #kreiranje novog prozora
    root = Tk()
    root.title('name')

    def save():
       print("test")

    #callback funkcija koju poziva Button
    def callback():
        global filter_image
        filter_number = int(e.get())
        filter_image = cv2.filter2D(img, -1, my_filter[filter_number-1], anchor=(-1,-1), borderType=cv2.BORDER_CONSTANT)
        root.destroy()
        cv2.imshow('SharpenImage', filter_image)

    #dodavanje polja za unos
    e = Entry(root)
    e.pack()
    e.focus()

    b = Button(root, text="Choose", command=callback)
    b.pack()

    #dodavanje labela koje ispisuju filtere
    label = Label(root, text="Choose one of the filters:")
    label1 = Label(root, text=my_filter[0])
    label2 = Label(root, text=my_filter[1])
    label3 = Label(root, text=my_filter[2])

    label.pack()
    label1.pack()
    label2.pack()
    label3.pack()
    
=======
from tkinter import *
import tkinter
import numpy as np
from PIL import Image
from PIL import ImageTk
import tkinter.filedialog as tkFileDialog
import cv2
import keyboard

global my_filter
global filter_image
global img2

def Sharpen(img):
    global filter_image
    global my_filter
    global img2
    
    img2 = img

    #definiranje 3 različita filtra
    my_filter = []

    filter1 = np.ones((3, 3), np.float32)
    filter1[0, 0] = 0
    filter1[0, 1] = -1
    filter1[0, 2] = 0
    filter1[1, 0] = -1
    filter1[1, 1] = 5
    filter1[1, 2] = -1
    filter1[2, 0] = 0
    filter1[2, 1] = -1
    filter1[2, 2] = 0
    my_filter.append(filter1)

    filter2 = np.ones((3, 3), np.float32)
    filter2[0, 0] = -1
    filter2[0, 1] = -1
    filter2[0, 2] = -1
    filter2[1, 0] = -1
    filter2[1, 1] = 5
    filter2[1, 2] = -1
    filter2[2, 0] = -1
    filter2[2, 1] = -1
    filter2[2, 2] = -1
    my_filter.append(filter2)

    filter3 = np.ones((3, 3), np.float32)
    filter3[0, 0] = -1
    filter3[0, 1] = -1
    filter3[0, 2] = -1
    filter3[1, 0] = -1
    filter3[1, 1] = 16
    filter3[1, 2] = -1
    filter3[2, 0] = -1
    filter3[2, 1] = -1
    filter3[2, 2] = -1
    my_filter.append(filter3)

    #kreiranje novog prozora
    root = Tk()
    root.title('name')

    def save():
       print("test")

    #callback funkcija koju poziva Button
    def callback():
        global filter_image
        filter_number = int(e.get())
        filter_image = cv2.filter2D(img, -1, my_filter[filter_number-1], anchor=(-1,-1), borderType=cv2.BORDER_CONSTANT)
        root.destroy()
        cv2.imshow('SharpenImage', filter_image)

    #dodavanje polja za unos
    e = Entry(root)
    e.pack()
    e.focus()

    b = Button(root, text="Choose", command=callback)
    b.pack()

    #dodavanje labela koje ispisuju filtere
    label = Label(root, text="Choose one of the filters:")
    label1 = Label(root, text=my_filter[0])
    label2 = Label(root, text=my_filter[1])
    label3 = Label(root, text=my_filter[2])

    label.pack()
    label1.pack()
    label2.pack()
    label3.pack()
    
>>>>>>> 5182916d9ebe06982fee53051a802908c9b75cb2
    mainloop()