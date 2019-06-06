$(document).ready(function () { 
                var cnpj_cpf = $("#user_cpf").val().replace(/[^\d]+/g,'');
                $("#user_telefone").inputmask({
                    mask: ["(99) 9999-9999", "(99) 99999-9999", ],
                    keepStatic: true
                });
                //deu conflito aki mas ja ta deboa kk
 
                $("#user_cpf").keypress(function(){

                if ($("#user_cpf").val().length <= 13){
                  $("#user_cpf").mask('000.000.000-00', {reverse: false});
                     cpf(cnpj_cpf);
                }else {
                     $("#user_cpf").mask('00.000.000/0000-00', {reverse: false});
                       cnpj(cnpj_cpf); 
                }
                });
                
            });
          
            $("#user_cpf").focus(function(){

                  cpf($("#user_cpf").val());
                  cnpj($("#user_cpf").val()); 

                });     
            
            function mudar_ok(){
                  document.getElementById('cpf').innerHTML =  "CPF OK";
                   document.getElementById('user_cpf').style.backgroundColor = "#00FF7F";
                     $('#enviar').show();
                     ///utilizando doom pos é oque eu mas conheço posso retirar depois
                     //aqui nos estamos mudando o a cor e do botão e descrição para true porque o cpf é valido
            }
            function mudar_falha(){
                  document.getElementById('cpf').innerHTML =  "CPF INVÁLIDO";
                   document.getElementById('user_cpf').style.backgroundColor = "#B22222";
                   document.getElementById('user_cpf').style.color = "white";
                   $('#enviar').hide();
                    //aqui nos fazemos basicamente o contrario 
            }
             function cpf(e) { //faz a limpeza do cpf e chama a função responsavel por alertar os erros no cpf
                        var limpar= $("#user_cpf");
                        limpar.focusout( function(){
                        var cpf = limpar.val();
                        var cpf_limp = cpf.replace(/\.|\-/g,'');
                        TestaCPF(cpf_limp);
                   });     
            };
            function cnpj(e) { //faz a limpeza do cpf e chama a função responsavel por alertar os erros no cpf
                        var limpar= $("#user_cpf");
                        limpar.focusout( function(){
                        var cnpj = limpar.val();
                        var cnpj_limp = cnpj.replace(/\.|\-/g,'');
                        testecnpj(cnpj_limp);
              });          
            };

            function TestaCPF(strCPF){
                var Soma;
                var Resto;
                Soma = 0;       //testa se o cpf é valido no frontend
              if (strCPF == "00000000000" || strCPF == "11111111111"|| strCPF == "22222222222" || strCPF == "3333333333" || strCPF == "44444444444" || strCPF == "55555555555" || strCPF == "66666666666" || strCPF == "77777777777" || strCPF == "88888888888" || strCPF == "9999999999") return mudar_falha();
                 
              for (i=1; i<=9; i++) Soma = Soma + parseInt(strCPF.substring(i-1, i)) * (11 - i);
              Resto = (Soma * 10) % 11;
               
                if ((Resto == 10) || (Resto == 11))  Resto = 0;
                if (Resto != parseInt(strCPF.substring(9, 10)) ) return mudar_falha();
               
              Soma = 0;
                for (i = 1; i <= 10; i++) Soma = Soma + parseInt(strCPF.substring(i-1, i)) * (12 - i);
                Resto = (Soma * 10) % 11;
               
                if ((Resto == 10) || (Resto == 11))  Resto = 0;
                if (Resto != parseInt(strCPF.substring(10, 11) ) ) return mudar_falha();
                 return mudar_ok();
            }

             function cnpj_success(texto){
                  document.getElementById('cpf').innerHTML =  "CNPJ OK";
                   document.getElementById('user_cpf').style.backgroundColor = "#00FF7F";
                     $('#enviar').show();
                     ///utilizando doom pos é oque eu mas conheço posso retirar depois
                     //aqui nos estamos mudando o a cor e do botão e descrição para true porque o cpf é valido
                }
                function cpnj_fail(){
                      document.getElementById('cpf').innerHTML =  "<li ' class='text-warning'>CNPJ INVÁLIDO</li>";
                       document.getElementById('user_cpf').style.backgroundColor = "#B22222";
                       document.getElementById('user_cpf').style.color = "white";
                       $('#enviar').hide();
                        //aqui nos fazemos basicamente o contrario 
                }


            function testecnpj(cnpj) {
 
              cnpj = cnpj.replace(/[^\d]+/g,'');
           
              if(cnpj == '') return false;
               
              if (cnpj.length != 14)
                  return cpnj_fail();
           
              // Elimina CNPJs invalidos conhecidos
              if (cnpj == "00000000000000" || 
                  cnpj == "11111111111111" || 
                  cnpj == "22222222222222" || 
                  cnpj == "33333333333333" || 
                  cnpj == "44444444444444" || 
                  cnpj == "55555555555555" || 
                  cnpj == "66666666666666" || 
                  cnpj == "77777777777777" || 
                  cnpj == "88888888888888" || 
                  cnpj == "99999999999999")
                  return cpnj_fail();
                   
              // Valida DVs
              tamanho = cnpj.length - 2
              numeros = cnpj.substring(0,tamanho);
              digitos = cnpj.substring(tamanho);
              soma = 0;
              pos = tamanho - 7;
              for (i = tamanho; i >= 1; i--) {
                soma += numeros.charAt(tamanho - i) * pos--;
                if (pos < 2)
                      pos = 9;
              }
              resultado = soma % 11 < 2 ? 0 : 11 - soma % 11;
              if (resultado != digitos.charAt(0))
                  return cpnj_fail();
                   
              tamanho = tamanho + 1;
              numeros = cnpj.substring(0,tamanho);
              soma = 0;
              pos = tamanho - 7;
              for (i = tamanho; i >= 1; i--) {
                soma += numeros.charAt(tamanho - i) * pos--;
                if (pos < 2)
                      pos = 9;
              }
              resultado = soma % 11 < 2 ? 0 : 11 - soma % 11;
              if (resultado != digitos.charAt(1))
                    return cpnj_fail();
                     
             return  cnpj_success();;
              
          }