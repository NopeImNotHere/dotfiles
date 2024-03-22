#!/bin/bash

# Check if iwctl is available
if ! command -v iwctl &> /dev/null; then
    echo "Error: iwctl not found. Make sure it is installed."
    exit 1
fi

# Function to check if Wi-Fi is currently on
is_wifi_on() {
    powered=$(iwctl device wlan0 show | awk '/Powered/ {print $NF}')
    echo $powered
    if [ "$powered" = "on" ]; then
        echo true;
    else
        echo false;
    fi
}

# Toggle Wi-Fi state
toggle_wifi() {
    if is_wifi_on; then
        # Wi-Fi is currently on, turn it off
        iwctl device wlan0 set-property Powered off
        echo -e "\e[34m󰀝\e[0mNO"
    else
        # Wi-Fi is currently off, turn it on
        iwctl device wlan0 set-property Powered on
        echo -e "\e[31m󰀝\e[0mYES"
    fi
}

# Check and toggle Wi-Fi state
toggle_wifi
