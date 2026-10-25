
# Notas

- he dejado el .BACK que es lo que yo uso para hacer un diff y ver que ha cambiado desde la version inicial
- he nombrado el archivo 0102 por como se llama el html, aunque esta es mi primera practica

# vscode

- les recomiendo la extension `ritwickdey.LiveServer` en vscode para que automaticamente recargue la pagina al hacer control S
  - y ademas se pueden poner breakpoints en vscode por si se está más acostumbrado https://stackoverflow.com/questions/46945784/how-to-debug-javascript-in-visual-studio-code-with-live-server-running
  - e.g. mi config:

```json
{
    "name": ".jschrome",
    "type": "chrome", "request": "launch",
    "url": "http://localhost:5500/DWEC/01-act",
    "webRoot": "${workspaceFolder}"
}
```