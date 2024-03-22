#!/bin/sh
#
# Location: /etc/acpi/handlers/backlight.sh
# A script to control backlight brightness with ACPI events
# Argument $1: either '-' for brightness up or '+' for brightness down

# Find the directory containing "amdgpu" in its name within /sys/class/backlight/
brightness_directory=$(find /sys/class/backlight/ -type d -name '*amdgpu*' 2>/dev/null)

# Check if the directory exists
if [ -n "$brightness_directory" ]; then
    # Get the path to the sysfs file controlling backlight brightness
    brightness_file="${brightness_directory}/brightness"

    # Step size for increasing/decreasing brightness.
    # Adjust this to a reasonable value based on the value of the file
    # `/sys/class/backlight/amdgpu_bl2/max_brightness` on your computer.
    step=20

    # Some scary-looking but straightforward Bash arithmetic and input/output redirection
    case $1 in
      # Increase current brightness by `step` when `+` is passed to the script
      +) echo $(($(< "${brightness_file}") + ${step})) > "${brightness_file}";;

      # Decrease current brightness by `step` when `-` is passed to the script
      -) echo $(($(< "${brightness_file}") - ${step})) > "${brightness_file}";;
    esac
else
    echo "Backlight directory not found."
fi
