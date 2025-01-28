# lab3-HY
#  README: Order Management System**  

# 1️ How to Run the System   

# Step 1: Setup Project  
1. Download and extract the project files.  

# Step 2: Start PHP Server 
1. Open the terminal or command prompt.  

2. Start the PHP built-in server:  
   ```
   php -S localhost:8000
   ```
3. Open your browser and visit:  
   ```
   http://localhost:8000/index.php
   ```

---

# 2️ System Features & Logic  

# Inventory Management (inventory.php)
- Functions: `load_data()`, `save_data()`, `add_product()`  
- Logic:  
  - Loads inventory data from `data.json`.  
  - Adds new products to inventory and updates `data.json`.  

# Order Processing (order.php) 
- Functions: `place_order()`  
- Logic:  
  - Checks stock availability.  
  - Deducts purchased quantity from inventory.  
  - Saves order details in `sales` records.  

# Sales Tracking (sales.php)
- Logic:  
  - Reads sales data from `data.json`.  
  - Calculates and displays total sales.  

# Product Search (search.php)
- Logic  
  - Takes user input and searches inventory.  
  - Displays matching products or a "No results" message.  

# Frontend & Forms (index.php)  
- Forms
  - Add product form 📝  
  - Place order form 🛍  
  - Search form 🔎  

# Data Storage: JSON (`data.json`)
- Stores inventory and sales records persistently.  

---

# 3 Summary   
1. Using Basic PHP functions & arrays 
2. No database required (uses JSON for storage)
3. clear HTML + CSS design

