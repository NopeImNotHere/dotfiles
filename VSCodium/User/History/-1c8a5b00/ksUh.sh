#!/bin/bash

# Check if nmcli is available
command -v nmcli > /dev/null 2>&1 || { echo "Error: nmcli not found."; exit 1; }

# Check if --toggle argument is provided
if [ "$1" == "--toggle" ]; then
    # Toggle WiFi
    wifi_status=$(nmcli -t -f WIFI g)
    if [ "$wifi_status" == "enabled" ]; then
        nmcli r all off
    else
        nmcli r all on
    fi
fi

# Display the current WiFi status
wifi_status=$(nmcli -t -f WIFI g)
if [ "$wifi_status" == "enabled" ]; then
    echo "󰀝 Blue"
else
    echo "󰀝 Red"
fi
