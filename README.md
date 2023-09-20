# ALÉM DO CÓDIGO: Arte dos Padrões de Projeto em Engenharia de Software

![License](https://img.shields.io/badge/License-MIT-green)
![Stars](https://img.shields.io/github/stars/growthcodeoficial/ADC-design-patterns-php)
![Forks](https://img.shields.io/github/forks/growthcodeoficial/ADC-design-patterns-php)
![Issues](https://img.shields.io/github/issues/growthcodeoficial/ADC-design-patterns-php)

## Um Guia Profundo em Padrões de Projeto e Boas Práticas de Codificação

### 1ª Edição | Autor: Walmir Silva
[Official Website](https://growthcode.com.br)

<img src="http://growthcode.com.br/wp-content/uploads/2023/09/ALEM-DO-CODIGO-e1695237045648.jpg" alt="Book Cover" />

---

## 📚 Índice

- [Sobre o Projeto](#sobre-o-projeto)
- [Público-Alvo](#público-alvo)
- [Pré-Requisitos](#pré-requisitos)
- [Instalação](#instalação)
  - [Clone o Repositório](#clone-o-repositório)
  - [Configuração e Instalação](#configuração-e-instalação)
- [Executando Testes](#executando-testes)
- [Makefile Comandos](#makefile-comandos)
- [Contribuição](#contribuição)
- [Contato](#contato)
- [Licença](#licença)

---

## 🎯 Sobre o Projeto

Este repositório é um complemento ao livro "ALÉM DO CÓDIGO: Arte dos Padrões de Projeto em Engenharia de Software". Aqui você encontrará todos os códigos de exemplo, arquivos PlantUML para diagramas e outras utilidades relacionadas à obra. O material visa ser um aprofundamento técnico e prático sobre padrões de projeto e melhores práticas em programação PHP.

---

## 👥 Público-Alvo

Este livro e repositório são voltados para desenvolvedores com conhecimento intermediário, estendendo-se até aqueles com níveis avançados que buscam elevar suas habilidades na engenharia de software.

---

## ⚙️ Pré-Requisitos

Para trabalhar com este projeto, é necessário ter instalado:

- [Docker](https://www.docker.com/)
- [GNU Make](https://www.gnu.org/software/make/)
- [PHP](https://www.php.net/)
- [Composer](https://getcomposer.org/)

> ⚠️ **Nota para usuários de Windows com WSL2:** Certifique-se de também ter o Docker para Windows e o ambiente WSL2 configurado. 

---

## 🛠 Instalação

### Clone o Repositório

```bash
git clone https://github.com/growthcodeoficial/ADC-design-patterns-php.git
```

### Configuração e Instalação

Este projeto faz uso intensivo de Docker e Makefile para automação e preparação do ambiente de desenvolvimento. 

```bash
# Para instalar todas as dependências
make install

# Para iniciar os containers
make up
```

Para mais detalhes, veja a [seção de comandos Makefile](#makefile-comandos).

---

## 🧪 Executando Testes

```bash
# Para executar todos os testes
make test

# Para executar testes numa classe específica
make test-class class=<ClassName>
```

---

## 📘 Makefile Comandos

Aqui estão explicados os comandos definidos no Makefile:

- `make up`: Inicializa os contêineres do Docker.
- `make down`: Desliga e remove os contêineres.
- `make restart`: Reinicia os contêineres.
- `make build`: Constrói ou reconstrói os serviços.
- `make logs`: Exibe os logs dos contêineres em tempo real.
- `make install`: Realiza a construção, inicialização e instalação das dependências.
- `make composer-install`: Instala as dependências do Composer.
- `make composer-install-dev`: Instala as dependências do Composer, incluindo as de desenvolvimento.
- `make test`: Executa todos os testes com PHPUnit.
- `make test-class`: Executa testes em uma classe específica.

Para mais informações, execute `make help`.

---

## 🤝 Contribuição

Contribuições, questões e solicitações de recursos são bem-vindos. Sinta-se livre para verificar [as issues](https://github.com/growthcodeoficial/ADC-design-patterns-php/issues) ou abrir um novo problema.

---

## 📞 Contato

- **Walmir Silva**
  - [GitHub](https://github.com/growthcodeoficial/)
  - [LinkedIn](https://www.linkedin.com/in/walmirfsilva)

---

## 📄 Licença

Este projeto está sob a licença MIT. Consulte o arquivo [LICENSE.md](LICENSE.md) para obter detalhes.

---

**Confiança Sempre!!!** 🌟