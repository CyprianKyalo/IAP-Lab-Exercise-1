# IAP-Lab-Exercise-1

## How to Deploy
### Part 1

1. To deploy this application, you need to pre-install a server on your local machine.
2. In the building of the application I have used the Apache server and the MySQL database.
3. Download **XAMPP** on your machine to get both the Apache server and the MySQL database.
4. Ensure both are running successfully.
5. Clone this repository under **Xampp/htdocs.**
6. To clone this repository, open your terminal(if you are using a Linux OS)or Git Bash(if you are using Windows), then type git clone `https://github.com/CyprianKyalo/IAP-Lab-Exercise-1.git` 
6. Create a database called `iap_app.sql` and import my database, `iap_app.sql`, in the cloned files.
7. After that you can successfully launch the application by typing **Localhost/App/Signup.php** to navigate to the register page.

### Part 2
#### Using the API
1. To make use of the food ordering API, you need to download **Postman.** This is an application that enables one to make requests.
2. After installing and firing up **Postman**, use the following as your URL: `http://localhost/App/API/order.php.`
3. Ensure that the request made is a **POST** request.
4. In the Body section, insert the following code:
```
{
    "fdname": "name of food",
    "quantity": "quantity of food"
}
```
5. You have successfully made an order if the following code returns as your response:
```
{
    "data": [
        {
            "OrderID": "order number",
            "Total Cost": "total cost of food"
        }
    ]
}
```

### Part 3
1. Navigate to **IAP-Lab-Exercise-1/Food.**
2. Create a database called `foods.sql`, then import the database `foods.sql` within the folder.
3. On you browser, type the following code to be able to obtains the Orders made: `http://localhost/App/Food/orders.php`
4. If a table with the order made is returned, you have successfully made use of the API to order food. 
