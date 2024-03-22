if status is-interactive
    atuin init fish --disable-up-arrow | source
end

function editconf -d "open ~/.config of current user"
    vscodium %HOME%/.config/
end