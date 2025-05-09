# UA Campus Store Remake v4.0

This project is an update of the UA Campus Store website remake with additional features such as ...

## Features
- Responsive design
- Navigation bar with links to different sections
- Hero section with a featured image
- Featured products section displaying popular items
- Footer with additional links
- Dynamically loaded search results from .csv files
- Search result sorting
- Add comment to product posting
- Add new products
- [NEW!] Integration with PokéAPI for little Pokémon emoji in product title
- [NEW!] Integration with OpenWeather API for shipping location weather
- [NEW!] Custom API to serve product data

## Getting Started

### Prerequisites
To run this project locally, you need to have the following installed:
- Git
- A web browser
- PHP

### How to Run The Project

1. **Clone the repository:**
    ```bash
    git clone https://github.com/ikhsaneff/mieffendy_hw5.git
    ```

2. **Navigate to the project directory:**
    ```bash
    cd mieffendy_hw5
    ```

4. **Make sure your PHP can handle HTTPS by configuring the php.ini file:**

   ***Go to your php.ini file, if it doesn't exist, copy the php.ini-development and rename the extension to .ini***

   ***Look for this line:***
   ```bash
   ;extension=openssl
   ```

   ***Uncomment the line by removing the semicolon (;)***

   ***Check if it's properly configured by running this line in your command line:***
   ```bash
   php --ini
   ```

3. **Create a .env file in the root directory and add the variable WEATHERAPI_KEY:**
   ```bash
   WEATHERAPI_KEY=yourapikeyhere
   ```

5. **Run the project using installed PHP:**
    ```bash
    php -S localhost:8000
    ```

6. **Open your browser and go to http://localhost:8000/**
