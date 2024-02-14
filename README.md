# MountainGoodness

I approached a small local business called Mountain Goodness in Revelstoke. It is a health food store that has a rewards program for every dollar you spend on supplements. If you spend $200 in supplements, you receive $10 off your next purchase. They currently keep track of the rewards of their customers through hundreds of cue cards. My proposed solution was to create a program that easily lets employees search for a customer, add the product and price of the supplement, and easily see how far away the customer is from the next reward.

# Users Manual
<img width="400" alt="Screenshot 2023-08-27 at 8 31 17 PM" src="https://github.com/ChloeEK/MountainGoodness/assets/77647819/577eb5ea-9d97-4d64-97dd-a2eccf73335a"> 

Main search page, search for customers LAST NAME. It will search for partial lastnames. For example: Searching ‘kni’ will bring up any name that has those letters in it.
Case insensitive.

<img width="400" alt="Screenshot 2023-08-27 at 8 38 48 PM" src="https://github.com/ChloeEK/MountainGoodness/assets/77647819/3d6fb4ca-6c7a-4db2-a17e-d7df070a9e6c">

This is the main profile for the customer. You can enter a new product by typing in the text boxes and then pressing the add product button. You can add multiple products at one time. If you want to delete a product, simple press the corresponding delete button. YOU CAN ONLY DELETE ONE PRODUCT AT A TIME. Once you delete the product you need to press ‘Save & Search’ and the re-enter the customers profile.

This is the same to edit the product. You will select the corresponding edit button for the product you want to edit. Text boxes will appear with the original product name and price, you will edit them and then press save. YOU CAN ONLY EDIT ONE PRODUCT AT A TIME. Once you edit the product you will need to press ‘Save & Search’ and then re-enter the customers profile.

<img width="400" alt="Screenshot 2023-08-27 at 8 38 53 PM" src="https://github.com/ChloeEK/MountainGoodness/assets/77647819/8cf25cd8-f9a5-48c6-b439-259f5864edbc">

When a customer has reached their $200 and you have pressed ‘Add Reward’ it will show $200 granted, along with the date. The button will disappear and only re appear when the amount towards the next reward is $200 or more.

<img width="450" alt="Screenshot 2023-08-27 at 8 39 08 PM" src="https://github.com/ChloeEK/MountainGoodness/assets/77647819/cb038f91-3caf-48cc-82f2-bfbdc3a1ed78">

To add a new customer, you will press ‘Add customer’ which is found on the top left corner of the search page. You will enter their first name, last name and their first product. Once you press add customer they will be searchable within the database.

# Trouble Shooting
Form Submission Error:
This will appear when you try to delete, edit or click back on a page. This is so the database doesn’t get updated. You will simple have to reload the page and re login
Webpage not secure error:
Make sure the website has HTTPS in front not HTTP, this is so you have a secure webpage.

