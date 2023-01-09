-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 19-Out-2022 às 15:37
-- Versão do servidor: 10.4.22-MariaDB
-- versão do PHP: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `bootcamp`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `categoria`
--

CREATE TABLE `categoria` (
  `id` int(11) NOT NULL,
  `categoria` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `categoria`
--

INSERT INTO `categoria` (`id`, `categoria`) VALUES
(5, 'Games'),
(6, 'Cinema'),
(7, 'Esportes');

-- --------------------------------------------------------

--
-- Estrutura da tabela `noticia`
--

CREATE TABLE `noticia` (
  `id` int(11) NOT NULL,
  `titulo` varchar(200) NOT NULL,
  `texto` longtext NOT NULL,
  `data` date NOT NULL,
  `categoria_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `noticia`
--

INSERT INTO `noticia` (`id`, `titulo`, `texto`, `data`, `categoria_id`) VALUES
(1, 'Flamengo domina por mais tempo e Corinthians confirma sua evolução na abertura da decisão', 'A sensação ao final dos primeiros 90 minutos da decisão da Copa do Brasil era de que nenhum dos lados estava exatamente frustrado. O Flamengo, porque embora superior por mais tempo no jogo de Itaquera, levava a decisão para o Maracanã.\r\n\r\nO Corinthians, por sua vez, vai ao Rio numa situação muito melhor do que enfrentou na Libertadores, quando saiu de seu estádio com dois gols de desvantagem. Além disso, diante de um adversário fortíssimo, a equipe de Vítor Pereira fez com que a partida confirmasse a impressão de que a diferença entre os dois times diminuiu desde o confronto de dois meses atrás. Os donos da casa tiveram seus momentos para tentar vencer.\r\n\r\nNão é correto dizer que os dois times não se agrediram, mas também é fato que moderaram riscos. O que não surpreendeu foram os caminhos pelos quais cada equipe tentou encontrar o gol: o Flamengo pelo centro, o Corinthians pelos lados.', '2022-10-13', 7),
(2, 'Presidente do Botafogo diz que Textor tentou tirar Pedro do Flamengo', 'John Textor se encantou com Pedro, do Flamengo, e tentou a contração do atacante rubro-negro no início do ano. O presidente do Botafogo, Durcesio Mello, revelou que o americano pediu para que o mandatário do Fla &#039;colocasse preço&#039; no jogador.\r\n\r\nO fato aconteceu no início da temporada, quando Pedro não estava sendo aproveitado pelo Flamengo e, inclusive, despertou o interesse do Palmeiras. Durcesio apresentou Textor a Rodolfo Landim em uma visita à Gávea que durou cerca de duas horas.', '2022-10-13', 7),
(4, 'História da Série B tem apenas três mudanças no G-4 nas últimas rodadas', 'Perto do fim, a Série B chega ao momento de definição e pode ter novos classificados para a Série A na próxima rodada. Além do Cruzeiro, já garantido e tranquilo na primeira posição, Grêmio, Bahia e Vasco seguem firmes no G-4 e são seguidos por outras cinco equipes ainda na briga pelo acesso. O problema para os concorrentes é que, historicamente, a Segunda Divisão tem mostrado pouca mudança nas últimas rodadas.\r\n\r\nEm 17 anos de pontos corridos na Série B, apenas três vezes o G-4 da Série B mudou entre a 35ª e 38ª rodada. Elas aconteceram nos anos de 2011, 2013 e 2014 e envolveram apenas uma troca de equipes.\r\n\r\nUma das raras mudanças aconteceu com um concorrente pelo G-4 em 2022. Em 2011, na 35ª rodada, o Sport estava em sétimo lugar na tabela de classificação e a três pontos do Bragantino, quarto. O Leão da Ilha fez uma reta final de perfeita e tomou a posição da equipe paulista, subindo com Portuguesa, Náutico e Ponte Preta.\r\n\r\nEm 2013 foi a vez do Figueirense ficar com a vaga do Icasa e subir para a Série A. Na 35ª rodada, o Figueira estava em sexto, mas só a um ponto do clube cearense, o suficiente para superar a distância e ficar com a quarta posição. Naquele ano, Palmeiras, Chapecoense e Sport também conseguiram o acesso.', '2022-10-18', 7),
(6, 'CREED 3: MICHAEL B. JORDAN E JONATHAN MAJORS SE ENFRENTAM NO PRIMEIRO TRAILER DO FILME', 'A aguardada sequência da franquia Creed está chegando. Agora, no primeiro trailer de Creed 3, vemos Michael B. Jordan e Jonathan Majors se enfrentando no ringue de combate.\r\n\r\nNo filme, continuamos acompanhando a história de Adonis “Donnie” Creed, vivido por Jordan, que é filho de Apollo Creed, o maior adversário de Rocky Balboa. Dessa vez, porém, ele terá que enfrentar Damian “Dame” Anderson, interpretado por Majors, que chega como um grande desafio na jornada do protagonista.\r\n\r\nNo trailer vemos que a rivalidade dos dois antecede a luta, tendo raízes bem antigas. Com isso, o confronto no ringue seja bastante pessoal e intenso.', '2022-10-18', 6),
(7, '8 FILMES COREANOS PARECIDOS COM PARASITA QUE VÃO EXPLODIR SUA MENTE', 'Bong Joon-ho marcou a história do cinema ao ganhar o Oscar de Melhor Filme em 2020. Com Parasita, o diretor chocou o público ao retratar aspectos globais de uma vida sobre os moldes do capitalismo.\r\n\r\nPorém, o maior destaque ficou para as reviravoltas do filme, que são de explodir cabeças. Alguns podem acreditar que apenas Parasita é capaz disso, mas a verdade é que o cinema coreano está repleto de produções assim. \r\n\r\nPor isso, separamos aqui 8 filmes coreanos que vão explodir sua mente. Confira! Já assistiu algum deles?', '2022-10-09', 6),
(8, 'GUERRAS SECRETAS: JOE RUSSO, DIRETOR DE VINGADORES: ULTIMATO, FALA SOBRE POSSIBILIDADE DE DIRIGIR ADAPTAÇÃO DA SAGA', 'Os irmãos Russo se tornaram bem populares entre os fãs do MCU após seu trabalho no universo de heróis da Marvel. Responsáveis por dois terços da trilogia focada no Capitão América, bem como a dobradinha de Vingadores: Guerra Civil e Ultimato, a dupla caiu nos gostos do público, fazendo com que muitos desejem seu retorno às produções da Marvel. Agora, o diretor Joe Russo falou sobre o assunto ao responder uma pergunta sobre seu envolvimento com uma possível adaptação da saga Guerras Secretas para o cinema.\r\n\r\nDurante a premiére de Homem-Aranha: Sem Volta Para Casa, o diretor foi entrevistado pela ComicBook. Questionado sobre estar trabalhando em Guerras Secretas, Joe Russo respondeu:\r\n\r\n“Um dia desses, vamos ter que ver como isso tudo acontece. Eu não sei o que eles vão fazer com todos esses personagens!”\r\n\r\nApós um momento de hesitação em responder se estaria conversando com a Marvel sobre um novo projeto, o diretor continuou, falando sobre a possibilidade de voltar a trabalhar no MCU:\r\n\r\n“Olha, nós [Joe e Anthony Russo] amamos esses caras, e eu não posso falar nem que sim nem que não, mas eu trabalharia com eles em um piscar de olhos. É a melhor experiência de trabalho de nossas carreiras. Eles são como família para nós. Amamos o material e amamos os fãs.”', '2022-10-01', 6),
(9, 'Ghostbusters: Spirits Unleashed é game assimétrico divertido e nostálgico; g1 jogou', 'Poucas adaptações de clássicos dos cinemas conseguem reproduzir, ou pelo menos simular, de maneira tão precisa as sensações dos originais quanto o game &quot;Ghostbusters: Spirits Unleashed&quot;.\r\n\r\nBaseado na franquia dos &quot;Caça-Fantasmas&quot;, o jogo de ação é divertido e nostálgico na dose certa – o que evoca lembranças dos originais dos anos 1980, assim como alguns de seus defeitos.\r\n\r\nCom foco na competição assimétrica online, &quot;Spirits Unleashed&quot; coloca uma equipe de quatro jogadores para capturarem um espírito maligno controlado por uma quinta pessoa, antes que ela assombre totalmente um local.\r\n\r\nHá também, no entanto, a opção de jogar acompanhado de inteligência artificial.\r\n\r\nO novo jogo da IllFonic, uma desenvolvedora com experiência no gênero com &quot;Predator: Hunting Grounds&quot;, é lançado nesta terça-feira (18) para PlayStation 4 e 5, Xbox Series X/S e Xbox One e computadores com partidas entre usuários de diferentes plataformas.', '2022-10-18', 5),
(10, 'Mortal Kombat terá jogo RPG para celulares em 2023', 'A franquia “Mortal Kombat” receberá um novo jogo e dessa vez, será um RPG para dispositivos mobile. O anúncio veio da Warner Bros. Games e pela desenvolvedora NetherRealm Studios.\r\n\r\nO jogo se chamará “Mortal Kombat: Onslaught” e será um RPG estratégico com colecionáveis, diferente do tradicional jogo de luta. De acordo com a declaração da WB Games, o título “apresentará a primeira experiência de história cinematográfica exclusiva para dispositivos móveis da franquia, onde os jogadores devem formar uma equipe de lutadores a partir de uma vasta lista de personagens”.\r\n\r\nEm entrevista ao Business Wire, Ed Boon, diretor de criação da NetherRealm, descreve o futuro RPG como um jogo de combate corpo a corpo, com ritmo dinâmico e seleção de estratégias por equipe. Segundo ele, o título tentará cativar tanto os fãs antigos como os novatos da franquia.', '2022-10-15', 5);

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

CREATE TABLE `usuario` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `login` varchar(20) NOT NULL,
  `senha` varchar(120) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`id`, `nome`, `email`, `login`, `senha`) VALUES
(1, 'Bill Gates', 'bill@gates.com', 'bill', '$2y$10$9/e95kuZcjcX8pQ3PR/.meqqJJ1yHopXC4yJ55lrP5lmuB7z4NqaC');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `noticia`
--
ALTER TABLE `noticia`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_noticia_categoria_idx` (`categoria_id`);

--
-- Índices para tabela `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `login_UNIQUE` (`login`),
  ADD UNIQUE KEY `email_UNIQUE` (`email`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `categoria`
--
ALTER TABLE `categoria`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de tabela `noticia`
--
ALTER TABLE `noticia`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de tabela `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `noticia`
--
ALTER TABLE `noticia`
  ADD CONSTRAINT `fk_noticia_categoria` FOREIGN KEY (`categoria_id`) REFERENCES `categoria` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
