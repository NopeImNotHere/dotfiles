if status is-interactive
    atuin init fish --disable-up-arrow | source
end

set -x PATH /home/ninh/.local/bin $PATH

function editconf -d "open ~/.config of current user"
    vscodium $HOME/.config/
end