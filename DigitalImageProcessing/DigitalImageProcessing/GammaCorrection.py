<<<<<<< HEAD
import numpy as np
import argparse
import cv2

def adjust_gamma(image, gamma=1.25):
	#kreiranje lookup tablice
	invGamma = 1.0 / gamma
	table = np.array([((i / 255.0) ** invGamma) * 255
		for i in np.arange(0, 256)]).astype("uint8")


	return cv2.LUT(image, table)
=======
import numpy as np
import argparse
import cv2

def adjust_gamma(image, gamma=1.25):
	#kreiranje lookup tablice
	invGamma = 1.0 / gamma
	table = np.array([((i / 255.0) ** invGamma) * 255
		for i in np.arange(0, 256)]).astype("uint8")


	return cv2.LUT(image, table)
>>>>>>> 5182916d9ebe06982fee53051a802908c9b75cb2
