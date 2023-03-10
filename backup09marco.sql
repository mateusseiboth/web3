--
-- PostgreSQL database dump
--

-- Dumped from database version 13.3
-- Dumped by pg_dump version 13.3

-- Started on 2023-03-09 22:27:39

SET statement_timeout = 0;
SET lock_timeout = 0;
SET idle_in_transaction_session_timeout = 0;
SET client_encoding = 'UTF8';
SET standard_conforming_strings = on;
SELECT pg_catalog.set_config('search_path', '', false);
SET check_function_bodies = false;
SET xmloption = content;
SET client_min_messages = warning;
SET row_security = off;

SET default_tablespace = '';

SET default_table_access_method = heap;

--
-- TOC entry 205 (class 1259 OID 16428)
-- Name: autor; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.autor (
    id integer NOT NULL,
    nome character varying(100),
    email character varying(100)
);


ALTER TABLE public.autor OWNER TO postgres;

--
-- TOC entry 204 (class 1259 OID 16426)
-- Name: autor_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.autor_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.autor_id_seq OWNER TO postgres;

--
-- TOC entry 3013 (class 0 OID 0)
-- Dependencies: 204
-- Name: autor_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.autor_id_seq OWNED BY public.autor.id;


--
-- TOC entry 203 (class 1259 OID 16420)
-- Name: categoria; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.categoria (
    id integer NOT NULL,
    descricao character varying(100)
);


ALTER TABLE public.categoria OWNER TO postgres;

--
-- TOC entry 202 (class 1259 OID 16418)
-- Name: categoria_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.categoria_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.categoria_id_seq OWNER TO postgres;

--
-- TOC entry 3014 (class 0 OID 0)
-- Dependencies: 202
-- Name: categoria_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.categoria_id_seq OWNED BY public.categoria.id;


--
-- TOC entry 200 (class 1259 OID 16407)
-- Name: noticia; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.noticia (
    id integer NOT NULL,
    titulo character varying(100),
    descricao text,
    autor character varying(100),
    data date,
    categoria_id integer
);


ALTER TABLE public.noticia OWNER TO postgres;

--
-- TOC entry 201 (class 1259 OID 16413)
-- Name: noticia_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.noticia_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.noticia_id_seq OWNER TO postgres;

--
-- TOC entry 3015 (class 0 OID 0)
-- Dependencies: 201
-- Name: noticia_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.noticia_id_seq OWNED BY public.noticia.id;


--
-- TOC entry 2865 (class 2604 OID 16431)
-- Name: autor id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.autor ALTER COLUMN id SET DEFAULT nextval('public.autor_id_seq'::regclass);


--
-- TOC entry 2864 (class 2604 OID 16423)
-- Name: categoria id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.categoria ALTER COLUMN id SET DEFAULT nextval('public.categoria_id_seq'::regclass);


--
-- TOC entry 2863 (class 2604 OID 16415)
-- Name: noticia id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.noticia ALTER COLUMN id SET DEFAULT nextval('public.noticia_id_seq'::regclass);


--
-- TOC entry 3007 (class 0 OID 16428)
-- Dependencies: 205
-- Data for Name: autor; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO public.autor VALUES (1, 'machado de assis', 'machado.de@assis.com');


--
-- TOC entry 3005 (class 0 OID 16420)
-- Dependencies: 203
-- Data for Name: categoria; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO public.categoria VALUES (1, 'Esporte');
INSERT INTO public.categoria VALUES (3, 'Culinária');
INSERT INTO public.categoria VALUES (6, 'Mundo');
INSERT INTO public.categoria VALUES (7, 'categoria 07 de Março de 2023.');
INSERT INTO public.categoria VALUES (5, 'BBB 16.5');
INSERT INTO public.categoria VALUES (4, 'Política4');


--
-- TOC entry 3002 (class 0 OID 16407)
-- Dependencies: 200
-- Data for Name: noticia; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO public.noticia VALUES (2, 'Argentina é campeã da copa do mundo', 'Após várias décadas, a Argentina conquista o bi-campeonato da Copa do Mundo. Messi substitui Maradona.', 'Socrates', '2022-11-30', 1);
INSERT INTO public.noticia VALUES (1, 'Terremoto na Turquia / Europa', 'Um grande terremoto destruiu várias cidades na Turquia. Vários países estão se mobilizando para ajudar no resgate das vítimas.', 'William Bonner', '2023-02-01', 4);


--
-- TOC entry 3016 (class 0 OID 0)
-- Dependencies: 204
-- Name: autor_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.autor_id_seq', 2, true);


--
-- TOC entry 3017 (class 0 OID 0)
-- Dependencies: 202
-- Name: categoria_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.categoria_id_seq', 8, true);


--
-- TOC entry 3018 (class 0 OID 0)
-- Dependencies: 201
-- Name: noticia_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.noticia_id_seq', 5, true);


--
-- TOC entry 2871 (class 2606 OID 16433)
-- Name: autor autor_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.autor
    ADD CONSTRAINT autor_pkey PRIMARY KEY (id);


--
-- TOC entry 2869 (class 2606 OID 16425)
-- Name: categoria categoria_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.categoria
    ADD CONSTRAINT categoria_pkey PRIMARY KEY (id);


--
-- TOC entry 2867 (class 2606 OID 16417)
-- Name: noticia noticia_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.noticia
    ADD CONSTRAINT noticia_pkey PRIMARY KEY (id);


-- Completed on 2023-03-09 22:27:39

--
-- PostgreSQL database dump complete
--

