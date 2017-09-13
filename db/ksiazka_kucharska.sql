--
-- PostgreSQL database dump
--

SET statement_timeout = 0;
SET lock_timeout = 0;
SET client_encoding = 'UTF8';
SET standard_conforming_strings = on;
SET check_function_bodies = false;
SET client_min_messages = warning;

--
-- Name: plpgsql; Type: EXTENSION; Schema: -; Owner: 
--

CREATE EXTENSION IF NOT EXISTS plpgsql WITH SCHEMA pg_catalog;


--
-- Name: EXTENSION plpgsql; Type: COMMENT; Schema: -; Owner: 
--

COMMENT ON EXTENSION plpgsql IS 'PL/pgSQL procedural language';


SET search_path = public, pg_catalog;

SET default_tablespace = '';

SET default_with_oids = false;

--
-- Name: kategoria; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE kategoria (
    id integer NOT NULL,
    createat timestamp without time zone DEFAULT now(),
    lastmodify timestamp without time zone DEFAULT now(),
    nazwa character varying(256) NOT NULL,
    image text
);


ALTER TABLE public.kategoria OWNER TO postgres;

--
-- Name: kategoria_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE kategoria_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.kategoria_id_seq OWNER TO postgres;

--
-- Name: kategoria_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE kategoria_id_seq OWNED BY kategoria.id;


--
-- Name: kontakt; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE kontakt (
    id integer NOT NULL,
    createat timestamp without time zone DEFAULT now(),
    lastmodify timestamp without time zone DEFAULT now(),
    imie character varying(64),
    email character varying(64),
    temat character varying(64),
    wiadomosc text
);


ALTER TABLE public.kontakt OWNER TO postgres;

--
-- Name: kontakt_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE kontakt_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.kontakt_id_seq OWNER TO postgres;

--
-- Name: kontakt_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE kontakt_id_seq OWNED BY kontakt.id;


--
-- Name: przepis; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE przepis (
    id integer NOT NULL,
    createat timestamp without time zone DEFAULT now(),
    lastmodify timestamp without time zone DEFAULT now(),
    nazwa text NOT NULL,
    skladniki text NOT NULL,
    wykonanie text NOT NULL,
    zrodlo text,
    uwagi text,
    zdjecie text
);


ALTER TABLE public.przepis OWNER TO postgres;

--
-- Name: przepis_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE przepis_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.przepis_id_seq OWNER TO postgres;

--
-- Name: przepis_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE przepis_id_seq OWNED BY przepis.id;


--
-- Name: przepiskategoria; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE przepiskategoria (
    id integer NOT NULL,
    createat timestamp without time zone DEFAULT now(),
    lastmodify timestamp without time zone DEFAULT now(),
    przepis_id integer,
    kategoria_id integer
);


ALTER TABLE public.przepiskategoria OWNER TO postgres;

--
-- Name: przepiskategoria_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE przepiskategoria_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.przepiskategoria_id_seq OWNER TO postgres;

--
-- Name: przepiskategoria_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE przepiskategoria_id_seq OWNED BY przepiskategoria.id;


--
-- Name: id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY kategoria ALTER COLUMN id SET DEFAULT nextval('kategoria_id_seq'::regclass);


--
-- Name: id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY kontakt ALTER COLUMN id SET DEFAULT nextval('kontakt_id_seq'::regclass);


--
-- Name: id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY przepis ALTER COLUMN id SET DEFAULT nextval('przepis_id_seq'::regclass);


--
-- Name: id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY przepiskategoria ALTER COLUMN id SET DEFAULT nextval('przepiskategoria_id_seq'::regclass);


--
-- Data for Name: kategoria; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY kategoria (id, createat, lastmodify, nazwa, image) FROM stdin;
1	2017-03-19 12:44:24.23098	2017-03-19 12:44:24.23098	Śniadania\n	/images/kategoria/breakfast.jpg
3	2017-03-19 12:44:24.23098	2017-03-19 12:44:24.23098	Kolacje\n	/images/kategoria/supper.jpg
4	2017-03-19 15:30:45.810004	2017-03-19 15:30:45.810004	Wigilia	/images/kategoria/christmas.jpg
9	2017-03-22 18:48:11.859607	2017-03-22 18:48:11.859607	Dania główne	/images/kategoria/dish.jpg
12	2017-03-22 18:48:11.859607	2017-03-22 18:48:11.859607	Sałatki i surówki\n	/images/kategoria/salad.jpg
14	2017-03-22 18:48:11.859607	2017-03-22 18:48:11.859607	Wielkanoc\n	/images/kategoria/easter.jpg
15	2017-03-22 18:48:11.859607	2017-03-22 18:48:11.859607	Urodziny\n	/images/kategoria/birthday.jpg
24	2017-03-22 18:48:53.524268	2017-03-22 18:48:53.524268	Makarony\n	/images/kategoria/pasta.jpg
25	2017-03-22 18:48:53.524268	2017-03-22 18:48:53.524268	Mięsa\n	/images/kategoria/meat.jpg
26	2017-03-22 18:48:53.524268	2017-03-22 18:48:53.524268	Ryby\n	/images/kategoria/fish.jpg
27	2017-03-22 18:48:53.524268	2017-03-22 18:48:53.524268	Zupy\n	/images/kategoria/soup.jpg
7	2017-03-19 15:36:50.029994	2017-03-19 15:36:50.029994	Pieczywa\n	/images/kategoria/bread2.jpg
2	2017-03-19 12:44:24.23098	2017-03-19 12:44:24.23098	Obiady\n	/images/kategoria/dinner.jpg
11	2017-03-22 18:48:11.859607	2017-03-22 18:48:11.859607	Desery	/images/kategoria/dessert.jpg
\.


--
-- Name: kategoria_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('kategoria_id_seq', 53, true);


--
-- Data for Name: kontakt; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY kontakt (id, createat, lastmodify, imie, email, temat, wiadomosc) FROM stdin;
13	2017-04-03 11:18:18.971951	2017-04-03 11:18:18.971951	Ania	bcvbcvbcv	xccx	bbhjh
14	2017-04-06 13:27:42.307343	2017-04-06 13:27:42.307343	Ania	bcvbcvbcv	xccx	gdg
15	2017-04-14 22:23:19.570078	2017-04-14 22:23:19.570078	Ania	gfdgf	fddf	dfg
16	2017-04-14 22:42:33.910879	2017-04-14 22:42:33.910879	Ania	ssa	dsad	hghjghjg
17	2017-04-15 14:42:39.347021	2017-04-15 14:42:39.347021	sdfsdf	sdffsd	ssfd	sdfsd
11	2017-03-24 10:34:52.924135	2017-03-24 10:34:52.924135	\N	\N	\N	\N
12	2017-03-24 11:14:41.335748	2017-03-24 11:14:41.335748	Ania	\N	dd	dd
18	2017-04-29 14:09:08.016108	2017-04-29 14:09:08.016108	cdsc	czc	zx	cxxz
19	2017-05-01 15:05:44.237763	2017-05-01 15:05:44.237763	xzvvz	zvz	xzxz	zvxv
20	2017-05-04 12:50:46.718762	2017-05-04 12:50:46.718762	ss	ss@wp.pl	ss	svv
21	2017-07-12 12:20:49.090111	2017-07-12 12:20:49.090111	Ania	aniazarem@gmail.com	dsad	sdsds
\.


--
-- Name: kontakt_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('kontakt_id_seq', 21, true);


--
-- Data for Name: przepis; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY przepis (id, createat, lastmodify, nazwa, skladniki, wykonanie, zrodlo, uwagi, zdjecie) FROM stdin;
55	2017-04-05 13:49:19.279888	2017-04-05 13:49:19.279888	Zielony krem z brokuła, groszku i szpinaku	1 brokuł, \n2 cebule, \n2 ząbki czosnku, \n150g świeżego szpinaku, \n150g groszku mrożonego, \n2 łyżki oliwy, \n1 łyżka masła, \n1l bulionu, \nopcjonalnie: 3 łyżki grysiku orkiszowego lub płatków orkiszowych,\ndodatki: prażony słonecznik, feta, ser pleśniowy (np. lazur, gorgonzola, roquefort), grzanki	Cebule, czosnek i cząstki brokuła (wraz z pokrojoną w plastry łodygą) podsmażamy na rozgrzanej oliwie z masłem przez ok. 5 minut. Następnie zalewamy bulionem, dodajemy orkisz (jeśli używamy) i gotujemy ok. 10 minut. Dodajemy groszek i szpinak, gotujemy jeszcze chwilę.\nJeśli brokuły i groszek są już miękkie zestawiamy zupę z ognia i całość blendujemy (najlepiej w blenderze kielichowym, wtedy konsystencja będzie bardzo kremowa, ale można też blenderem ręcznym). Doprawiamy solą i pieprzem. Podajemy na gorąco z wybranymi dodatkami.	kucharenka.pl	\N	\N
5	2017-03-19 15:19:41.031693	2017-03-19 15:19:41.031693	Karp w orzechach z masłem migdałowym	1 kg karpia,\n1 banan,\n1/2 pomarańczy, \n2 zielone cebulki, \n2 ząbki czosnku ,\n1/2 cytryny,\n50 g masła,\n50 g orzechów nerkowca, \n50 g migdałów w płatkach,\n4 gałązki natki pietruszki, \nsól, \npieprz czarny, \npieprz cayenne	Karpia umyj w zimnej wodzie i wytrzyj do sucha. Ostrym nożem natnij poprzecznie skórę z obu stron na pasy 2-centymetrowej szerokości. Dzięki temu aromat przypraw lepiej przeniknie do mięsa, usuwając mulisty zapach ryby.  Przygotuj mieszankę soli, świeżego pieprzu oraz cayenne i natrzyj rybę z zewnątrz i wewnątrz. Ilość ostrego cayenne dozuj według własnych upodobań – jednak ryba nie powinna być zbyt ostra. Rybę przełóż na blachę z pieca lub szeroką formę. Banany obierz i pokrój na plasterki, włóż kilka sztuk do brzucha ryby, a resztę rozłóż na wierzchu. Pomarańczę i cytrynę dobrze umyj i pokrój w półplasterki. Owoce rozgnieć nad rybą, aby skropić mięso świeżym sokiem. Kawałkami owoców obłóż rybę, częścią z nich napełnij wnętrze karpia. Orzechy nerkowca pokrój w kawałki i powkładaj pomiędzy przeciętą skórę mięsa. Pokrój drobno czosnek, jedną dymkę w piórka i posyp rybę. Masło pokrój na cienkie plasterki i nałóż na wierzch owoców. Rybę zostaw do zamarynowania na kilka godzin (najlepiej na całą noc). Piekarnik rozgrzej do temperatury 200° stopni i włóż rybę na blachę lub formę. Dodatkowo wlej jeszcze 100 ml wody. Karpia piecz przez 30 minut. Regularnie polewaj wierzch ryby sosem z pieczenia. To nada chrupkości oraz zapewni soczystość upieczonej rybie. Na 10 min przed końcem pieczenia wyjmij blachę i posyp wierzch karpia płatkami migdałów,następnie zapiecz. Pamiętaj dalej o podlewaniu wytopionym masłem. Gotową rybę wyjmij z pieczenia. Nakryj folią aluminiową i odstaw, aby odpoczęła. W tym czasie posiekaj natkę pietruszki i dymkę. Przełóż rybę na półmisek i posyp dekoracyjnie natką i zieloną cebulką.	https://www.tesco.pl/smaczna-strona/	\N	\N
7	2017-03-19 15:27:35.42446	2017-03-19 15:27:35.42446	Uszka	ciasto na uszka:,\n2 i 1/2 szklanki mąki pszennej,\n1/2 szklanki wody,\n1 jajo,\nnadzienie do uszek:,\n8 grzybów z barszczu,\n1 cebula,\n1 łyżka oleju,\n1 jajko,\nbułka tarta (ok. 4 łyżek),\nsól, \npieprz	Przygotuj ciasto na uszka: mąkę, sól i jajko najpierw wyrób nożem. Powoli dodawaj wodę nadal wyrabiając. Później wszystko ugnieć rękami. Ciasto zawiń w ściereczkę i odstaw na chwilę. Przygotuj nadzienie: grzyby zmiel razem z podsmażoną na oleju cebulką. Dodaj jajko i bułkę tartą, aby zagęścić masę (jeśli zajdzie potrzeba dodaj więcej bułki tartej). Dopraw solą i pieprzem. Rozwałkuj ciasto i wycinaj z niego małe kwadraty. Na każdy kwadrat nałóż nadzienie, złóż po przekątnej i dokładnie zlep brzegi. Połącz również przeciwległe końce (możesz posmarować końce białkiem lub wodą, jeżeli nie będą chciały się zlepić). Gotowe pierogi podgotuj we wrzącej wodzie na chwilę przed podaniem. Gdy wypłyną, wyjmij od razu łyżką cedzakową.	https://www.tesco.pl/smaczna-strona/	\N	\N
52	2017-04-04 13:30:54.4267	2017-04-04 13:30:54.4267	Poolish	450g mąki chlebowej (pszenna typ 650-750), \n450g wody, \n1/8 łyżeczki drożdży instant	Drożdże dodać do miski z wodą, następnie dokładnie wymieszać z mąką. Przykryć miskę folią spożywczą i zostawić na ok. 12-16 godzin (najlepiej w temp. 21’C).	\N	Składniki na 2 duże bochenki. \nPoolish to po prostu zaczyn na drożdżach, który składa się z równych proporcji wody i mąki. Pomysł na ten zaczyn pochodzi z Polski i jest on stosowany obecnie na całym świecie.	\N
60	2017-04-15 14:10:47.280619	2017-04-15 14:10:47.280619	Biszkopt	<p>5 jajek w temperaturze pokojowej,</p>\r\n<p>110 g mąki pszennej typ 450,</p>\r\n<p>150 g drobnego cukru,</p>\r\n<p>40 g mąki ziemniaczanej</p>	<p>Piekarnik rozgrzać do temperatury 160 C. Tortownicę o średnicy 22 &ndash; 23 cm wyłożyć papierem do pieczenia, ale tylko jej dno, bok&oacute;w formy niczym nie smarować. Białka oddzielić od ż&oacute;łtek, z białek ubić sztywną pianę, wsypać cukier łyżka po łyżce ciągle ubijając. Dodać ż&oacute;łtka jedno po drugim nie przerywając miksowania. Do niewielkiej miski przesiać dwie mąki, dodać je w dw&oacute;ch porcjach do masy, delikatnie miksując na najniższych obrotach. Ciasto przelać do przygotowanej formy, wyr&oacute;wnać wierzch, wstawić do nagrzanego piekarnika i piec 30-40 min. Kiedy ciasto jest już upieczone wyjąć z piekarnika i z wysokości 60 cm upuścić (w formie) na podłogę (rzucanie zapobiega opadaniu ciasta). Formę z ciastem odstawić do lekko uchylonego piekarnika do całkowitego wystygnięcia.</p>	www.sprawdzonakuchnia.pl	\N	60.jpeg
1	2017-03-19 12:50:34.237953	2017-03-19 12:50:34.237953	Chleb oliwski	<p>300 ml wody,</p>\r\n<p>7g drozdzy suszonych,</p>\r\n<p>150 g maki zytniej,</p>\r\n<p>450 g maki przennej,</p>\r\n<p>lyzka oliwy,</p>\r\n<p>1 i 1/2 lyzeczki soli</p>	<p id="docs-internal-guid-fb10e4eb-d884-2ac5-2035-513e4dabe792" dir="ltr" style="text-align: left;">Wszystkie suche składniki łączymy ze sobą w misie. Powoli wlewamy letnią wodę z oliwą i wyrabiamy ciasto przez ok. 3 minuty. Wyrobione ciasto przekładamy do keks&oacute;wki wysmarowanej oliwą i obsypaną bułką tartą. Zwilżoną dłonią wyr&oacute;wnujemy wierzch ciasta. Formę przykrywamy ściereczką i wstawiamy do lod&oacute;wki na noc (ok.8 godzin). Rano wyciągamy keks&oacute;wkę z lod&oacute;wki i zostawiamy na 30 minut w ciepłym miejscu. Wierzch ciasta smarujemy łyżką oliwy i wkładamy do rozgrzanego pieca. Chleb pieczemy przez 20 minut w 200 stopniach. Następnie wierzch chleba smarujemy rozbełtanym ż&oacute;łtkiem i dopiekamy przez kolejnych 20 minut. Gotowy chleb wyciągamy z formy i studzimy na kuchennej kratce.</p>	\N	\N	\N
50	2017-04-04 13:04:09.080584	2017-04-04 13:04:09.080584	Chleb wiejski	<p>450g mąki chlebowej (pszenna typ 650-750), 170g wody, przygotowany wcześniej poolish, 20g soli, 5g drożdży instant</p>	<p>Mąkę wymieszać w misce z wodą oraz gotowym zaczynem poolish, tak by składniki się połączyły &ndash; powstanie postrzępiona masa. Przykryć miskę folią spożywczą i odstawić na 30 minut. Do przemieszanego wcześniej ciasta dodać s&oacute;l oraz drożdże i wyrobić ciasto (można robotem kuchennym &ndash; w&oacute;wczas trwa to ok. 2-4 minuty). Gotowe ciasto powinno być gładkie, elastyczne i niezbyt luźne. Wyrobione ciasto przykryć i odstawić na 70 minut &ndash; w tym czasie ciasto powinno być dwa razy składane* &ndash; 1. raz po upływie 25 minut, 2. raz po upływie kolejnych 25 minut. Pod tym linkiem możecie zobaczyć jak składać ciasto. Wyrośnięte ciasto po upływie wskazanych 70 minut podzielić na 2 r&oacute;wne części i uformować 2 bochenki. Bochenki można lekko opruszyć mąką i przełożyć na blachę i przykryć czystą ściereczką. Odstawić na 25-30 minut. Piekarnik nagrzać do 240&rsquo;C &ndash; bez termoobiegu, grzanie g&oacute;ra-d&oacute;ł (można włożyć do niego naczynie z wodą lub wrzucić kilka kostek lodu tuż przed włożeniem chleba**). Chleb ponacinać i włożyć do rozgrzanego piekarnika na dolny poziom. Piec ok. 35 minut. W połowie czasu pieczenia można na chwilę lekko uchylić drzwiczki piekarnika, żeby wyleciała z niego para &ndash; dzięki temu bochenki nie opadną i będą chrupiące.</p>	kucharenka.pl	<p>Składniki na 2 duże bochenki. *Składanie chleba &ndash; podczas tej czynności pozbywamy się dwutlenku węgla, dzięki czemu fermentacja drożdży będzie przebiegać właściwie. Poza tym wzmacniamy ciasto, dlatego też nie należy ciasta podsypywać na początku zbytnio mąką jeśli wydaje się ono zbyt luźne, bo składanie sprawia, że ciasto staje się mocniejsze. ** Para w piekarniku powoduje uzyskanie ładniejszego &ndash; ciemniejszego koloru sk&oacute;rki chleba oraz bardziej pulchnego chleba, ponieważ dzięki wilgotności panującej w piekarniku sk&oacute;rka na chlebie jest dłużej wilgotna, dzięki czemu chleb może się rozrastać. Mniej więcej w połowie czasu pieczenia, należy pozbyć się pary z piekarnika, poprzez np. uchylenie delikatnie drzwiczek na chwilkę, by para wyleciała. Dzięki temu sk&oacute;rka będzie chrupiąca.</p>	\N
4	2017-03-19 15:15:13.423908	2017-03-19 15:15:13.423908	Baba cytrynowa	<p>450 g mąki tortowej,</p>\r\n<p>300 g margaryny,</p>\r\n<p>5 jaj,</p>\r\n<p>250 g cukru pudru,</p>\r\n<p>2 łyżeczki proszku do pieczenia (50g),</p>\r\n<p>sok z 1 cytryny,</p>\r\n<p>1 łyżka octu jabłkowego,</p>\r\n<p>1 - 2 łyżki margaryny (do wysmarowania formy)</p>	<p>Cukier puder utrzyj z masłem w miseczce za pomocą drewnianej łyżki, aż do uzyskania konsystencji gęstej śmietany. W międzyczasie stopniowo dodawaj ż&oacute;łtka z jajek (nie wszystkie na raz). Do utartej masy dodaj sok z jednej cytryny. Mąkę przesiej przez sito, wymieszaj z proszkiem do pieczenia i dodaj do utartej masy, ciągle mieszając. Następnie do całości dodaj łyżkę stołową octu jabłkowego i wymieszaj. Wszystko przeł&oacute;ż do wysmarowanej margaryną formy. Piecz przez ok. 1 godz. w temperaturze 180-200&deg;.</p>	https://www.tesco.pl/smaczna-strona/	\N	4.jpeg
6	2017-03-19 15:25:11.192685	2017-03-19 15:25:11.192685	Barszcz czerwony z uszkami	<p>5 burak&oacute;w,</p>\r\n<p>2 marchwie,</p>\r\n<p>1 pietruszka,</p>\r\n<p>kawałek selera,</p>\r\n<p>kawałek pora,</p>\r\n<p>1/2 kg cebuli,</p>\r\n<p>1/2 l koncentratu barszczu (kwasu buraczanego),</p>\r\n<p>sok z 1 cytryny,</p>\r\n<p>2 litry wody,</p>\r\n<p>1 łyżka cukru,</p>\r\n<p>8 suszonych dużych grzyb&oacute;w,</p>\r\n<p>5 ziaren ziela angielskiego,</p>\r\n<p>1 liść laurowy,</p>\r\n<p>5 ziaren pieprzu,</p>\r\n<p>s&oacute;l do smaku,</p>\r\n<p>pieprz,</p>\r\n<p>uszka</p>	<p style="text-align: justify;">Umyte grzyby namaczaj w &frac12; l wody przez 2 godz. Następnie ugotuj grzyby w tej samej wodzie, w kt&oacute;rej się moczyły (ok. 15 min). Odcedź grzyby od wywaru. Marchewkę, pietruszkę, seler, cebulę oraz kawałek pora umyj, oczyść i wł&oacute;ż do 1 litra gotującej się osolonej i osłodzonej wody. Po chwili dodaj obrane, opłukane i pokrojone w plastry buraki, s&oacute;l i pieprz, a następnie gotuj przez ok. 30 min. Po ugotowaniu odcedź warzywa od wywaru. Wymieszaj wywary z grzyb&oacute;w i warzyw, a następnie dolej kwas buraczany (na 1 i &frac12; l wywaru wlej &frac12; kwasu buraczanego). Dodaj liść laurowy, pieprz w ziarnach i ziele angielskie. Dopraw według uznania solą, pieprzem i łyżką cukru (możesz też dodać majeranek), a następnie podgotuj na wolnym ogniu (ok. 20 min) i pod koniec gotowania wlej sok z cytryny do smaku. Przed podaniem barszcz podgrzewaj powoli. Pamiętaj, że nie możesz go zagotować. Podawaj z uszkami.</p>	https://www.tesco.pl/smaczna-strona/	\N	\N
56	2017-04-05 15:07:51.444632	2017-04-05 15:07:51.444632	Bułki pszenne razowe	<p>200ml mleka + 5 łyżek,</p>\r\n<p>20g drożdże,</p>\r\n<p>25g masło,</p>\r\n<p>200g mąka pszenna,</p>\r\n<p>180g mąka pszenna razowa,</p>\r\n<p>1,5 płaskiej łyżeczki soli,</p>\r\n<p>1 łyżeczka cukru,</p>\r\n<p><strong>do posmarowania bułek:</strong></p>\r\n<p>jajko rozbełtane z wodą,</p>\r\n<p>otręby pszenne,</p>\r\n<p>słonecznik,</p>\r\n<p>zioła</p>	<p>Mąkę przesiać do miski i wymieszać z solą. Dodać masło i utrzeć z mąką. 5 łyżek mleka wymieszać dokładnie z drożdżami i cukrem, po czym wlać do mąki z masłem i dokładnie wymieszać. Wyrabiając ciasto, stopniowo dodawać mleko. Następnie wyrabiać ok. 8-10 min. Ciasto przykryć czystą ściereczką i odstawić do wyrastania na ok. 1-1,5h w ciepłe miejsce (powinno podwoić objętość). Na blaszce rozłożyć papier do pieczenia. Z wyrośniętego ciasta formować bułeczki &ndash; powinno wyjść ok. 7-8 dość dużych bułek. Bułki przykryć ściereczką i odstawić jeszcze na ok. p&oacute;ł godziny do wyrastania. Wyrośnięte bułeczki posmarować jajkiem i posypać ulubioną posypką: słonecznikiem, otrębami czy np. ziołami. Piec przez ok. 8 min 220&rsquo;C po czym zmniejszyć temperaturę do 200&rsquo;C i piec jeszcze ok. 10 min.</p>	kucharenka.pl	<p>Spos&oacute;b formowania bułek: zawijać jakbyśmy chcieli utworzyć sakiewkę.</p>\r\n<p>https://www.youtube.com/watch?v=TB908K3Kd6k</p>	\N
99	\N	\N	aaaaaacdddddd	<p>ccxc</p>	<p>cxcz</p>	zczc	<p>zccz</p>	99.jpeg
57	2017-04-15 11:08:22.938754	2017-04-15 11:08:22.938754	Bagietki	<p><strong>Poolish:</strong></p>\r\n<p>150 g mąki pszennej chlebowej,</p>\r\n<p>150 g wody,</p>\r\n<p>1/8 łyżeczki suszonych drożdży instant</p>\r\n<p><strong>Ciasto:</strong></p>\r\n<p>460 g mąki pszennej chlebowej,</p>\r\n<p>300 g wody,</p>\r\n<p>10 g soli,</p>\r\n<p>2 g drożdży instant,</p>\r\n<p>poolish</p>	<p><strong>Poolish:</strong></p>\r\n<p>Mąkę łączymy z drożdżami i wodą. Mieszamy do osiągnięcia gładkiego ciasta. Przykrywamy je folią spożywczą i zostawiamy na 12-16 godzin w temperaturze ok. 21 stopni.</p>\r\n<p><strong>Ciasto:</strong></p>\r\n<p>Następnego dnia umieszczamy w misie mąkę, s&oacute;l, drożdże, przygotowany wcześniej poolish oraz wodę. Całość mieszamy za pomocą miksera z hakiem przez 3 minuty na najniższej prędkości. Następnie mieszamy jeszcze 3-3,5 minuty na średniej prędkości. Po tym czasie ciasto powinno być elastyczne i niezbyt luźne. Przekładamy je do naoliwionej misy, przykrywamy folią spożywczą lub ściereczką. Stawiamy w ciepłym miejscu na 2 godziny. Po godzinie ciasto przekładamy na opr&oacute;szony mąką blat i je składamy. Umieszczamy ponownie w misie na kolejną godzinę. Ciasto dzielimy na dwie porcje. Formujemy kule, kt&oacute;re zostawiamy na posypanej mąką powierzchni, złączeniem ku g&oacute;rze. Przykrywamy folią lub ściereczką. Po 10-30 minutach formujemy dwie bagietki. Układamy je między fałdami ściereczki (widoczne na zdjęciu). Przykrywamy dodatkowo ściereczką. Zostawiamy do wyrośnięcia na 1-1,5 h. Wyrośnięte bagietki (kt&oacute;re można dodatkowo naciąć) pieczemy w rozgrzanym piekarniku, w temperaturze 240 stopni przez ok. 25 minut.</p>	Jeffrey Hamelman	\N	\N
100	\N	\N	aaaaaacddeeee	<p>dcvcv</p>	<p>cvvccxv</p>	xcvvcx	<p>cvvc</p>	100.jpeg
\.


--
-- Name: przepis_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('przepis_id_seq', 100, true);


--
-- Data for Name: przepiskategoria; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY przepiskategoria (id, createat, lastmodify, przepis_id, kategoria_id) FROM stdin;
231	2017-03-30 12:50:20.086629	2017-03-30 12:50:20.086629	5	2
232	2017-03-30 12:50:20.086629	2017-03-30 12:50:20.086629	5	4
233	2017-03-30 12:50:30.00642	2017-03-30 12:50:30.00642	7	2
234	2017-03-30 12:50:30.00642	2017-03-30 12:50:30.00642	7	4
241	2017-04-04 13:43:09.240824	2017-04-04 13:43:09.240824	52	7
242	2017-04-05 13:49:19.279888	2017-04-05 13:49:19.279888	55	2
243	2017-04-05 13:49:19.279888	2017-04-05 13:49:19.279888	55	14
244	2017-04-05 13:49:19.279888	2017-04-05 13:49:19.279888	55	27
396	2017-06-23 12:43:47.914564	2017-06-23 12:43:47.914564	60	11
397	2017-06-23 12:43:47.914564	2017-06-23 12:43:47.914564	60	15
398	2017-06-23 12:43:57.552982	2017-06-23 12:43:57.552982	99	2
399	2017-06-23 12:43:57.552982	2017-06-23 12:43:57.552982	99	4
260	2017-05-01 13:34:10.420171	2017-05-01 13:34:10.420171	50	7
400	2017-06-23 12:52:52.273825	2017-06-23 12:52:52.273825	100	11
401	2017-06-23 22:04:24.468259	2017-06-23 22:04:24.468259	4	11
402	2017-06-23 22:04:24.468259	2017-06-23 22:04:24.468259	4	4
272	2017-05-05 13:43:56.767518	2017-05-05 13:43:56.767518	6	2
273	2017-05-05 13:43:56.767518	2017-05-05 13:43:56.767518	6	4
277	2017-05-05 14:10:45.516367	2017-05-05 14:10:45.516367	1	7
280	2017-05-05 14:14:59.065847	2017-05-05 14:14:59.065847	56	7
283	2017-05-05 14:22:19.566177	2017-05-05 14:22:19.566177	57	7
\.


--
-- Name: przepiskategoria_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('przepiskategoria_id_seq', 402, true);


--
-- Name: kategoria_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY kategoria
    ADD CONSTRAINT kategoria_pkey PRIMARY KEY (id);


--
-- Name: kontakt_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY kontakt
    ADD CONSTRAINT kontakt_pkey PRIMARY KEY (id);


--
-- Name: przepis_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY przepis
    ADD CONSTRAINT przepis_pkey PRIMARY KEY (id);


--
-- Name: przepiskategoria_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY przepiskategoria
    ADD CONSTRAINT przepiskategoria_pkey PRIMARY KEY (id);


--
-- Name: przepiskategoria_idkategoria_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY przepiskategoria
    ADD CONSTRAINT przepiskategoria_idkategoria_fkey FOREIGN KEY (kategoria_id) REFERENCES kategoria(id);


--
-- Name: przepiskategoria_idprzepis_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY przepiskategoria
    ADD CONSTRAINT przepiskategoria_idprzepis_fkey FOREIGN KEY (przepis_id) REFERENCES przepis(id);


--
-- Name: public; Type: ACL; Schema: -; Owner: postgres
--

REVOKE ALL ON SCHEMA public FROM PUBLIC;
REVOKE ALL ON SCHEMA public FROM postgres;
GRANT ALL ON SCHEMA public TO postgres;
GRANT ALL ON SCHEMA public TO PUBLIC;


--
-- PostgreSQL database dump complete
--

