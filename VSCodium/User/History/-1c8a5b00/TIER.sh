#!/bin/bash

# Check the current status of nmcli radio
status=$(nmcli radio | grep -E '^[[:space:]]*WIFI')

# Polybar color codes
red="%{F#FF0000}"
blue="%{F#0000FF}"
reset="%{F-}"

# Check if WiFi is on or off
if [[ $status == *"enabled"* ]]; then
    # WiFi is enabled
    echo -e "${blue}󰀝${reset}"
else
    # WiFi is disabled
    echo -e "${red}󰀝${reset}"
fi
