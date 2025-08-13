#!/bin/bash

# Script para iniciar o servidor PHP interno no container

echo "🚀 Iniciando servidor PHP interno..."
echo "📍 Servidor rodando em: http://localhost:8000"
echo "🛑 Para parar: Ctrl+C"
echo ""

# Comando para rodar o servidor PHP interno
docker exec -it php_app php -S 0.0.0.0:8000 -t /var/www/html
