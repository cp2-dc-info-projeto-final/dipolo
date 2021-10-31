# Documento de Casos de Uso

## Lista dos Casos de Uso

 - [CDU 01](#CDU-01): Cadastro de usuários
 - [CDU 02](#CDU-02): Login
 - [CDU 03](#CDU-03): Editar usuários
 - [CDU 04](#CDU-04): Logout


## Lista dos Atores

 - Cras tempor
 - Donec a lorem

## Diagrama de Casos de Uso

![Diagrama de Casos de Uso](diagrama-exemplo.png)

## Descrição dos Casos de Uso

### CDU 01

Cadastro de usuários

**Fluxo Principal**

 	1. O sistema apresenta um botão "Cadastrar-se"
	2. O usuário clica no botão "Cadastrar-se"
	3. O sistema encaminha o usuário para a página de cadastro
	4. O sistema apresenta um formulário com os campos a serem preenchidos
	5. O usuário insere nickname, nome completo, data de nascimento, email, confirmar email, senha, confirmar senha
	6. O usuário insere o código de administrador se for um administrador
	7. O usuário clica no botão "Enviar"
	8. O sistema valida os campos
	9. O sistema armazena o perfil e informa ao usuário que a operação foi concluída com sucesso
	10. O sistema encaminha o usuário para a tela principal

**Fluxo Alternativo A**

	1. O sistema apresenta um botão "Cadastrar-se"
	2. O usuário clica no botão "Cadastrar-se"
	3. O sistema encaminha o usuário para a página de cadastro
	4. O sistema apresenta um formulário com os campos a serem preenchidos
	5. O usuário insere nickname, nome completo, data de nascimento, email, confirmar email, senha, confirmar senha
	6. O usuário insere o código de administrador se for um administrador
	7. O usuário clica no botão "Enviar"
	8. O sistema informa que existem campos inválidos
	9. O usuário corrige os campos inválidos e clica no botão "Enviar"
	10. O sistema valida os campos
	11. O sistema armazena o perfil e informa ao usuário que a operação foi concluída com sucesso
	12. O sistema encaminha o usuário para a tela principal

**Fluxo Alternativo B**

	1. O sistema apresenta um botão "Cadastrar-se"
	2. O usuário clica no botão "Cadastrar-se"
	3. O sistema encaminha o usuário para a página de cadastro
	4. O sistema apresenta um formulário com os campos a serem preenchidos
	5. O usuário insere nickname, nome completo, data de nascimento, email, confirmar email, senha, confirmar senha
	6. O usuário insere o código de administrador, se for um administrador
	7. O usuário clica no botão "Enviar"
	8. O sistema informa que o campo código de administrador não é válido
	9. O usuário corrige o código de administrador e clica no botão "Enviar"
	10. O sistema valida os campos
	11. O sistema armazena o perfil e informa ao usuário que a operação foi concluída com sucesso
	12. O sistema encaminha o usuário para a tela principal



### CDU 02

Login

**Fluxo Principal**

	1. O sistema apresenta um formulário com os campos nickname e senha
	2. O usuário insere seu nickname e sua senha e clica no botão "Entrar"
	3. O sistema valida o nickname e a senha do usuário
	4. O sistema encaminha o usuário para a tela inicial
	
**Fluxo Alternativo A**

	1. O sistema apresenta um formulário com os campos nickname e senha
	2. O usuário insere seu nickname e sua senha e clica no botão "Entrar"
	3. O sistema informa que o nickname e/ou a senha são inválidos
	4. O usuário corrige as informações de nickname e senha e clica no botão "Entrar"
	5. O sistema valida o nickname e a senha do usuário
	6. O sistema encaminha o usuário para a tela inicial

### CDU 03

Editar Usuário

**Fluxo Principal**

	1. O sistema apresenta um botão "Editar"
	2. O usuário clica no botão "Editar"
	3. O sistema encaminha o usuário para a página de editar dados
	4. O sistema apresenta um formulário com os campos do usuário
	5. O usuário altera os campos desejados
	6. O usuário preenche os campos obrigatórios
	7. O sistema valida os campos
	8. O sistema armazena as alterações e informa ao usuário que que a operação foi concluída com sucesso
        9. O sistema encaminha o usuário para a tela inicial

**Fluxo Alternativo A**

	1. O sistema apresenta um botão "Editar"
	2. O usuário clica no botão "Editar"
	3. O sistema encaminha o usuário para a página de editar dados
	4. O sistema apresenta um formulário com os campos do usuário
	5. O usuário altera os campos desejados
	6. O usuário preenche os campos obrigatórios
	7. O sistema informa que existem campos inválidos
	8. O usuário corrige os campos inválidos 
	9. O usuário preenche os campos obrigatórios e clica no botão "Enviar"
       10. O sistema valida os campos
       11. O sistema armazena as alterações e informa ao usuário que a operação foi concluída com sucesso
       12. O sistema encaminha o usuário para a tela principal

**Fluxo Alternativo B**

	1. O sistema apresenta um botão "Editar"
	2. O usuário clica no botão "Editar"
	3. O sistema encaminha o usuário para a página de editar dados
	4. O sistema apresenta um formulário com os campos do usuário
	5. O usuário altera os campos desejados
	6. O usuário preenche os campos obrigatórios
	7. O sistema informa que a senha atual não correspode à senha cadastrada 
	8. O usuário corrige a senha atual 
	9. O usuário preenche os campos obrigatórios e clica no botão "Enviar"
       10. O sistema valida os campos
       11. O sistema armazena as alterações e informa ao usuário que a operação foi concluída com sucesso
       12. O sistema encaminha o usuário para a tela principal 

### CDU 02

Morbi fringilla dolor at mattis vestibulum.

**Fluxo Principal**

1. Lorem ipsum dolor sit amet, consectetur adipiscing elit.
2. Mauris varius massa ac fermentum scelerisque.
3. Morbi in tortor dignissim, bibendum tellus et, varius odio.
4. Mauris egestas leo a suscipit feugiat.

**Fluxo Alternativo A**

1. Nulla elementum diam eu elementum rutrum.
2. Aenean scelerisque est at nunc ornare, ac condimentum justo sollicitudin.
3. Quisque eget risus ut est lacinia sollicitudin ac non diam.
4. Quisque ac nulla convallis, lobortis nibh ac, tristique enim.
5. Nulla ultricies metus nec risus mollis, interdum ultrices justo malesuada.

### CDU 02

Morbi fringilla dolor at mattis vestibulum.

**Fluxo Principal**

1. Lorem ipsum dolor sit amet, consectetur adipiscing elit.
2. Mauris varius massa ac fermentum scelerisque.
3. Morbi in tortor dignissim, bibendum tellus et, varius odio.
4. Mauris egestas leo a suscipit feugiat.

**Fluxo Alternativo A**

1. Nulla elementum diam eu elementum rutrum.
2. Aenean scelerisque est at nunc ornare, ac condimentum justo sollicitudin.
3. Quisque eget risus ut est lacinia sollicitudin ac non diam.
4. Quisque ac nulla convallis, lobortis nibh ac, tristique enim.
5. Nulla ultricies metus nec risus mollis, interdum ultrices justo malesuada.

