# Variáveis
DC = docker-compose
EXEC_PHP = $(DC) exec php

# Comandos padrões
.DEFAULT_GOAL := help

.PHONY: help
help: ## Exibe essa ajuda
	@grep -E '^[a-zA-Z_-]+:.*?## .*$$' $(MAKEFILE_LIST) | awk 'BEGIN {FS = ":.*?## "}; {printf "\033[36m%-30s\033[0m %s\n", $$1, $$2}'
	@echo "\nExemplos:"
	@echo "  make up                           # Inicia os contêineres"
	@echo "  make test-class class=YourClass   # Executa testes em 'YourClass'"
	@echo "  make composer-install-dev         # Instala as dependências do Composer incluindo as de desenvolvimento"

up: composer-install ## Inicia os contêineres
	$(DC) up -d

down: ## Para e remove os contêineres
	$(DC) down

restart: down up ## Reinicia os contêineres

build: ## Constrói ou reconstrói os serviços
	$(DC) build

logs: ## Acompanha os logs dos contêineres
	$(DC) logs -f

install: build up composer-install ## Constrói, inicia e instala as dependências do Composer

composer-install: ## Instala as dependências do Composer
	$(EXEC_PHP) composer install

composer-install-dev: ## Instala as dependências do Composer incluindo as de desenvolvimento
	$(EXEC_PHP) composer install --dev

test: ## Executa os testes com PHPUnit
	$(EXEC_PHP) vendor/bin/phpunit

test-class: ## Executa testes em uma classe específica (usar como make test-class class=<ClassName>)
	$(EXEC_PHP) vendor/bin/phpunit --filter $(class)

bash: ## Acessa o shell do contêiner PHP
	$(EXEC_PHP) bash
