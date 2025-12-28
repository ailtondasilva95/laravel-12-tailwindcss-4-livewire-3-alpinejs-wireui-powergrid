document.addEventListener("livewire:init", () => {
    const applyTheme = (theme) => {
        document.documentElement.setAttribute("data-theme", theme);
        localStorage.setItem("theme", theme);
    };

    // Atualiza quando o usuário clica em um botão Livewire
    Livewire.on("theme-changed", ({ theme }) => {
        applyTheme(theme);
    });

    // Reage a mudanças do sistema se localStorage estiver vazio
    window.matchMedia("(prefers-color-scheme: dark)").addEventListener("change", () => {
        if (!localStorage.getItem("theme")) {
            const sysTheme = window.matchMedia("(prefers-color-scheme: dark)").matches ? "dark" : "light";
            applyTheme(sysTheme);
        }
    });
});
