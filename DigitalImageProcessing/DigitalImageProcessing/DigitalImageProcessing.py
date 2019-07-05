from tkinter import *
import tkinter
import numpy as np
import PIL.Image, PIL.ImageTk
import tkinter.filedialog as tkFileDialog
import cv2

#povezivanje s vanjskim skriptama
import RGBtoGRAY
import Histogram
import GammaCorrection
import Convolution
import Correlation
import Median
import ImageSharpening
import GradientMagnitude
import CombiningImages
import MorphologicalFiltering


class App:
    global new_path
    new_path = None

    #inicijalizacija glavnog prozora

    def __init__(self, window, window_title):
        global path
        #dohvat putanje slike
        path = tkFileDialog.askopenfilename()

        #kreiranje prozora
        self.window = window
        self.window.title(window_title)

        #kreiranje menija
        menu = Menu(window)
        window.config(menu=menu)

        fileMenu = Menu(menu)
        menu.add_cascade(label="File", menu=fileMenu)
        fileMenu.add_command(label="Open Picture", command=self.open_file)
        fileMenu.add_command(label="Reset Picture", command=self.reset_image)
        fileMenu.add_separator()
        fileMenu.add_command(label="Exit", command=exit)

        imageMenu = Menu(menu)
        menu.add_cascade(label="Image", menu=imageMenu)
        imageMenu.add_command(label="Black&White", command=self.black_and_white)
        imageMenu.add_command(label="Plot Histogram", command=self.plot_histogram)
        imageMenu.add_command(label="Histogram Stretch", command=self.stretch_imageHist)
        imageMenu.add_command(label="Histogram Equalize", command=self.equalize_imageHist)
        imageMenu.add_command(label="Gamma Correction", command=self.gamma_correction)
        imageMenu.add_command(label="Convolution", command=self.convolution)
        imageMenu.add_command(label="Correlation", command=self.correlation)
        imageMenu.add_command(label="Median", command=self.median)
        imageMenu.add_command(label="Image Sharpening", command=self.sharpen)
        imageMenu.add_command(label="Magnitude Gradient", command=self.gradient)
        imageMenu.add_command(label="Combine Images", command=self.combine)
        imageMenu.add_command(label="Erode", command=self.erose)
        imageMenu.add_command(label="Dilate", command=self.dilate)
        imageMenu.add_command(label="Morphological Opening", command=self.morph_open)
        imageMenu.add_command(label="Morpohological Closing", command=self.morph_close)

        #loadiranje slike
        self.cv_img = cv2.cvtColor(cv2.imread(path), cv2.COLOR_BGR2RGB)

        self.height, self.width, no_channels = self.cv_img.shape

        #kreiranje canvasa za postavit sliku
        self.canvas = tkinter.Canvas(window, width = self.width, height = self.height)
        self.canvas.pack()

        #prebacivanje slike u PIL format
        self.photo = PIL.ImageTk.PhotoImage(image = PIL.Image.fromarray(self.cv_img))

        self.canvas.create_image(0, 0, image=self.photo, anchor=tkinter.NW)

        self.window.mainloop()

    #kreiranje funkcija za pozive vanjskih skripti
    def black_and_white(self):
        self.cv_img = RGBtoGRAY.ToGray(self.cv_img)
        self.photo = PIL.ImageTk.PhotoImage(image = PIL.Image.fromarray(self.cv_img))
        self.canvas.create_image(0, 0, image=self.photo, anchor=tkinter.NW)

    def plot_histogram(self):
        Histogram.PlotHistogram(self.cv_img)

    def stretch_imageHist(self):
        self.cv_img = Histogram.Stretch(self.cv_img)
        self.photo = PIL.ImageTk.PhotoImage(image = PIL.Image.fromarray(self.cv_img))
        self.canvas.create_image(0, 0, image=self.photo, anchor=tkinter.NW)

    def equalize_imageHist(self):
        self.cv_img = Histogram.Equalize(self.cv_img)
        self.photo = PIL.ImageTk.PhotoImage(image = PIL.Image.fromarray(self.cv_img))
        self.canvas.create_image(0, 0, image=self.photo, anchor=tkinter.NW)

    def gamma_correction(self):
        self.cv_img = GammaCorrection.adjust_gamma(self.cv_img)
        self.photo = PIL.ImageTk.PhotoImage(image = PIL.Image.fromarray(self.cv_img))
        self.canvas.create_image(0, 0, image=self.photo, anchor=tkinter.NW)

    def convolution(self):
        self.cv_img = Convolution.Convo(self.cv_img)
        self.photo = PIL.ImageTk.PhotoImage(image = PIL.Image.fromarray(self.cv_img))
        self.canvas.create_image(0, 0, image=self.photo, anchor=tkinter.NW)

    def correlation(self):
        global new_path
        r = cv2.selectROI(self.cv_img, False, False)
        imCrop = self.cv_img[int(r[1]):int(r[1]+r[3]), int(r[0]):int(r[0]+r[2]), 0]
        if(new_path == None):
            img = cv2.imread(path, 0)
            self.cv_img = Correlation.correlation(img, imCrop)
        else:
            img = cv2.imread(new_path, 0)
            self.cv_img = Correlation.correlation(img, imCrop)

    def median(self):
        self.cv_img = Median.Median(self.cv_img)
        self.photo = PIL.ImageTk.PhotoImage(image = PIL.Image.fromarray(self.cv_img))
        self.canvas.create_image(0, 0, image=self.photo, anchor=tkinter.NW)

    def sharpen(self):
        ImageSharpening.Sharpen(self.cv_img)

    def gradient(self):
        self.cv_img = GradientMagnitude.Gradient(self.cv_img)
        self.photo = PIL.ImageTk.PhotoImage(image = PIL.Image.fromarray(self.cv_img))
        self.canvas.create_image(0, 0, image=self.photo, anchor=tkinter.NW)

    def combine(self):
        self.cv_img = CombiningImages.Combine(self.cv_img)
        self.photo = PIL.ImageTk.PhotoImage(image = PIL.Image.fromarray(self.cv_img))
        self.canvas.create_image(0, 0, image=self.photo, anchor=tkinter.NW)

    def erose(self):
        self.cv_img = MorphologicalFiltering.Erosion(self.cv_img)
        self.photo = PIL.ImageTk.PhotoImage(image = PIL.Image.fromarray(self.cv_img))
        self.canvas.create_image(0, 0, image=self.photo, anchor=tkinter.NW)

    def dilate(self):
        self.cv_img = MorphologicalFiltering.Dilatation(self.cv_img)
        self.photo = PIL.ImageTk.PhotoImage(image = PIL.Image.fromarray(self.cv_img))
        self.canvas.create_image(0, 0, image=self.photo, anchor=tkinter.NW)

    def morph_open(self):
        self.cv_img = MorphologicalFiltering.Opening(self.cv_img)
        self.photo = PIL.ImageTk.PhotoImage(image = PIL.Image.fromarray(self.cv_img))
        self.canvas.create_image(0, 0, image=self.photo, anchor=tkinter.NW)

    def morph_close(self):
        self.cv_img = MorphologicalFiltering.Closing(self.cv_img)
        self.photo = PIL.ImageTk.PhotoImage(image = PIL.Image.fromarray(self.cv_img))
        self.canvas.create_image(0, 0, image=self.photo, anchor=tkinter.NW)

    def open_file(self):
        global new_path
        new_path = tkFileDialog.askopenfilename()
        self.cv_img = cv2.cvtColor(cv2.imread(new_path), cv2.COLOR_BGR2RGB)
        self.photo = PIL.ImageTk.PhotoImage(image = PIL.Image.fromarray(self.cv_img))
        self.canvas.create_image(0, 0, image=self.photo, anchor=tkinter.NW)

    def reset_image(self):
        global new_path
        if(new_path == None):
            self.cv_img = cv2.cvtColor(cv2.imread(path), cv2.COLOR_BGR2RGB)
            self.photo = PIL.ImageTk.PhotoImage(image = PIL.Image.fromarray(self.cv_img))
            self.canvas.create_image(0, 0, image=self.photo, anchor=tkinter.NW)
        else:
            self.cv_img = cv2.cvtColor(cv2.imread(new_path), cv2.COLOR_BGR2RGB)
            self.photo = PIL.ImageTk.PhotoImage(image = PIL.Image.fromarray(self.cv_img))
            self.canvas.create_image(0, 0, image=self.photo, anchor=tkinter.NW)
        

#Kreiranje prozora i prosljedivanje App objektu
App(tkinter.Tk(), "Digital Image Processing")