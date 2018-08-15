Objetivos do projeto
====================

- Permitir a manipulação de uma blockchain
-- Configuração do que vai nos blocos
-- Configuração de qual hash criptográfico
-- Critérios de aceitação do bloco
-- Adicionar novo bloco
-- Consultar um bloco específico na cadeia
-- Efetuar busca em um dos campos configurados na cadeia (demorar)

- Arquivos serão salvos em formato binário

- Arquivos podem ou não ser criptografados (conforme configuração/assimétrico)

- É mantido um index dos blocos já existentes
-- É possível efetuar a recriação dos índices? 

- É possível verificar a veracidade das informações salvas na cadeia

- Opções de configuração:
-- Pasta para salvar blocos (default: pasta data do projeto)
-- Pasta para salvar índices (default: mesma pasta dos blocos)
-- algoritmo utilizado no hash (default: sha256 but supports any of hash_algos())
-- Merkle Root (default: não)
-- Tamanho máximo do arquivo binário (quando excede o tamanho ele cria um novo arquivo)
-- Prefixo a ser utilizado no nome dos arquivos de bloco
-- Dificuldade (número de ZEROS no ińício da string. default: no)

- Atributos default do bloco:
-- version
-- index
-- timestamp
-- prevhash
-- blockhash
-- datalength
-- totallength
-- data
-- nonce (default: 0)
-- merkleroot