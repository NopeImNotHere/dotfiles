#!/bin/bash

# Parse command-line arguments
while getopts "t" opt; do
  case $opt in
    t)
      toggle=true
      ;;
    \?)
      echo "Invalid option: -$OPTARG" >&2
      exit 1
      ;;
  esac
done

# Check the current status of nmcli radio
current_status=$(nmcli radio | grep -E '^[[:space:]]*WIFI')

# Polybar color codes
red="%{F#FF0000}"
blue="%{F#0000FF}"
reset="%{F-}"

# Function to toggle WiFi state
toggle_wifi() {
    nmcli radio all off
    sleep 1
    nmcli radio all on
}

# Check if the toggle flag is set
if [ "$toggle" = true ]; then
    toggle_wifi
fi

# Print the colored icon based on the current WiFi status
if [[ $current_status == *"enabled"* ]]; then
    echo -e "${blue}󰀝${reset}"
else
    echo -e "${red}󰀝${reset}"
fi
