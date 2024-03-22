#!/bin/bash

# Check if iwctl is available
if ! command -v iwctl &> /dev/null; then
    echo "Error: iwctl not found. Make sure it is installed."
    exit 1
fi

# Function to check if Wi-Fi is currently on
is_wifi_on() {
    powered=$(iwctl device wlan0 show | awk '/Powered/ {print $NF}')
    if [ "$powered" = "on" ]; then
        return 0  # true
    else
        return 1  # false
    fi
}

toggle_wifi() {
    if is_wifi_on; then
        # Wi-Fi is currently on, turn it off
        iwctl device wlan0 set-property Powered off
        echo -e "%{F#2193ff}󰀝%{F-}"
    else
        # Wi-Fi is currently off, turn it on
        iwctl device wlan0 set-property Powered on
        echo -e "%{F#e06c75}󰀝%{F-}"
    fi
}


# Check and toggle Wi-Fi state
toggle_wifi