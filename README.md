# Plugin WordPress 🛠️ Advanced Bookmarks
A set of advanced bookmarks for counting words, keyword density, duplicate text (Google) and links.

## 1. Count words
Selects all the text on the webpage using document.body.innerText and counts the number of words using the split() method. It then displays an alert message with the number of words on the page.

## 2. Count keyword frequency
Prompts the user to enter a keyword and then checks the density of that keyword on the page by counting the number of times it appears and dividing it by the total number of words on the page. It then displays an alert message with the keyword density.

## 3. Find duplicate
Gets the selected text on the page and opens a new browser tab with a Google search for that text.

## 4. Count Links
Counts the number of links on the page that have the rel attribute set to "nofollow" and displays an alert message with the count.

## 5. Highlight all nofollow
Changes the background color of all links on the page with the rel attribute set to "nofollow" to yellow, it also change the padding and fontWeight

## 6. Broken link
Checks all the links on the page that starts with "http" and checks if they are broken, if they are, it change the background color, color, padding and fontWeight of the link

## Display menubar: 
![menubar](https://user-images.githubusercontent.com/84940616/213591746-dad2ccc8-56f6-4d56-a477-c73d1ac4bee0.png)

## Display Broken link and Highlight nofollow: 
![broken](https://user-images.githubusercontent.com/84940616/213591823-a852de33-7c64-4f33-ae80-c9e75ae4a2db.png)
