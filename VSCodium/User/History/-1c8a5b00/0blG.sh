#!/bin/bash

# Check if iwctl is available
if ! command -v iwctl &> /dev/null; then
    echo "Error: iwctl not found. Make sure it is installed."
    exit 1
fi

# Function to check if Wi-Fi is currently on
is_wifi_on() {
    powered=exec iwctl device wlan0 show | grep -q "Powered"
    if powered == "off"; then
        return 0;
    else
        return 1;
    fi
}

# Toggle Wi-Fi state
toggle_wifi() {
    if is_wifi_on; then
        # Wi-Fi is currently on, turn it off
        iwctl device wlan0 set-property Powered off
        echo -e "\e[34m󰀝\e[0m"
    else
        # Wi-Fi is currently off, turn it on
        iwctl device wlan0 set-property Powered off
        echo -e "\e[31m󰀝\e[0m"
    fi
}

# Check and toggle Wi-Fi state
toggle_wifi
