#!/bin/bash

# Check if iwctl is available
if ! command -v iwctl &> /dev/null; then
    echo "Error: iwctl not found. Make sure it is installed."
    exit 1
fi

# Function to check if Wi-Fi is currently on
is_wifi_on() {
    iwctl station wlan0 list-networks | grep -q "SSID"
}

# Toggle Wi-Fi state
toggle_wifi() {
    if is_wifi_on; then
        # Wi-Fi is currently on, turn it off
        iwctl device wlan0 set-property Powered off
        echo "Wi-Fi is now OFF."
    else
        # Wi-Fi is currently off, turn it on
        iwctl device wlan0 set-property Powered off
        echo "Wi-Fi is now ON."
    fi
}

# Check and toggle Wi-Fi state
toggle_wifi
