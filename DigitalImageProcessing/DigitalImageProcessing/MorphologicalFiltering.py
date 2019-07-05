import cv2
import numpy as np

def Dilatation(img):
    img_gray = cv2.cvtColor(img, cv2.COLOR_BGR2GRAY)
    (threshold, binary_img) = cv2.threshold(img, 127, 255, cv2.THRESH_BINARY)
    my_filter=np.ones((5,5), np.uint8)
    dilatation = cv2.dilate(binary_img, my_filter, iterations=1)
    return dilatation

def Erosion(img):
    img_gray = cv2.cvtColor(img, cv2.COLOR_BGR2GRAY)
    (threshold, binary_img) = cv2.threshold(img, 127, 255, cv2.THRESH_BINARY)
    my_filter=np.ones((5,5), np.uint8)
    erosion = cv2.erode(binary_img, my_filter, iterations=1)
    return erosion

def Opening(img):
    img_gray = cv2.cvtColor(img, cv2.COLOR_BGR2GRAY)
    (threshold, binary_img) = cv2.threshold(img, 127, 255, cv2.THRESH_BINARY)
    my_filter=np.ones((5,5), np.uint8)
    opening = cv2.erode(binary_img, my_filter, iterations=1)
    opening = cv2.dilate(binary_img, my_filter, iterations=1)
    return opening

def Closing(img):
    img_gray = cv2.cvtColor(img, cv2.COLOR_BGR2GRAY)
    (threshold, binary_img) = cv2.threshold(img, 127, 255, cv2.THRESH_BINARY)
    my_filter=np.ones((5,5), np.uint8)
    closing = cv2.dilate(binary_img, my_filter, iterations=1)
    closing = cv2.erode(binary_img, my_filter, iterations=1)
    return closing