import cv2
import sys

def process_image(image_path):
    #ngeluarin
    image = cv2.imread(image_path)
    
    if image is None:
        print("Error: Could not load image.")
        return

    #process the image (e.g., convert to grayscale)
    gray_image = cv2.cvtColor(image, cv2.COLOR_BGR2GRAY)

    
    output_path = 'processed_image.jpg'  # You can change this to your desired output path
    cv2.imwrite(output_path, gray_image)
    print(f"Processed image saved as {output_path}")

if __name__ == "__main__":
    if len(sys.argv) < 2:
        print("Usage: python process_image.py <image_path>")
    else:
        process_image(sys.argv[1])  #Pass the image path as an argument