PGDMP     
                    {         	   estaciona    14.7    14.7 7    C           0    0    ENCODING    ENCODING        SET client_encoding = 'UTF8';
                      false            D           0    0 
   STDSTRINGS 
   STDSTRINGS     (   SET standard_conforming_strings = 'on';
                      false            E           0    0 
   SEARCHPATH 
   SEARCHPATH     8   SELECT pg_catalog.set_config('search_path', '', false);
                      false            F           1262    16384 	   estaciona    DATABASE     ]   CREATE DATABASE estaciona WITH TEMPLATE = template0 ENCODING = 'UTF8' LOCALE = 'en_US.utf8';
    DROP DATABASE estaciona;
                postgres    false            �            1255    16385    encerrar_ticket(integer)    FUNCTION     ]  CREATE FUNCTION public.encerrar_ticket(ticket_id integer) RETURNS void
    LANGUAGE plpgsql
    AS $$
begin
	update vaga set estado = true where vaga.id = (select vaga_id from ticket where ticket.id = ticket_id);
	update ticket set hora_saida = current_timestamp where ticket_id = ticket.id;
	update ticket set total_pago = (EXTRACT(EPOCH FROM hora_saida) - EXTRACT(EPOCH FROM hora_entrada))/3600
	* 
	(select preco from tipo where (select tipo_id from ticket where ticket.id = ticket_id) = tipo.id) where ticket.id = ticket_id;
	update ticket set estado = false where ticket_id = ticket.id;
	
	
end;
$$;
 9   DROP FUNCTION public.encerrar_ticket(ticket_id integer);
       public          postgres    false            �            1255    16387 2   inserir_ticket(integer, integer, integer, boolean)    FUNCTION     ]  CREATE FUNCTION public.inserir_ticket(carro integer, vaga_uso integer, tipo integer, estado boolean) RETURNS void
    LANGUAGE plpgsql
    AS $$
begin
	insert into ticket(carro_id, vaga_id, tipo_id, hora_entrada, estado) values (carro, vaga_uso, tipo, CURRENT_TIMESTAMP, estado);
	update vaga set estado = false where vaga.id = vaga_uso;
	
end;
$$;
 d   DROP FUNCTION public.inserir_ticket(carro integer, vaga_uso integer, tipo integer, estado boolean);
       public          postgres    false            �            1259    16388    carro    TABLE     o   CREATE TABLE public.carro (
    id integer NOT NULL,
    placa character varying(7),
    cliente_id integer
);
    DROP TABLE public.carro;
       public         heap    postgres    false            �            1259    16391    carro_id_seq    SEQUENCE     �   CREATE SEQUENCE public.carro_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 #   DROP SEQUENCE public.carro_id_seq;
       public          postgres    false    209            G           0    0    carro_id_seq    SEQUENCE OWNED BY     =   ALTER SEQUENCE public.carro_id_seq OWNED BY public.carro.id;
          public          postgres    false    210            �            1259    16392    cliente    TABLE     �   CREATE TABLE public.cliente (
    id integer NOT NULL,
    nome character varying(50),
    cpf character varying(11),
    telefone character varying(11)
);
    DROP TABLE public.cliente;
       public         heap    postgres    false            �            1259    16395    cliente_id_seq    SEQUENCE     �   CREATE SEQUENCE public.cliente_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 %   DROP SEQUENCE public.cliente_id_seq;
       public          postgres    false    211            H           0    0    cliente_id_seq    SEQUENCE OWNED BY     A   ALTER SEQUENCE public.cliente_id_seq OWNED BY public.cliente.id;
          public          postgres    false    212            �            1259    16396    ticket    TABLE       CREATE TABLE public.ticket (
    id integer NOT NULL,
    carro_id integer,
    vaga_id integer,
    tipo_id integer,
    hora_entrada timestamp without time zone,
    estado boolean,
    hora_saida timestamp without time zone,
    total_pago numeric(5,2)
);
    DROP TABLE public.ticket;
       public         heap    postgres    false            �            1259    16399    ticket_id_seq    SEQUENCE     �   CREATE SEQUENCE public.ticket_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 $   DROP SEQUENCE public.ticket_id_seq;
       public          postgres    false    213            I           0    0    ticket_id_seq    SEQUENCE OWNED BY     ?   ALTER SEQUENCE public.ticket_id_seq OWNED BY public.ticket.id;
          public          postgres    false    214            �            1259    16400    tipo    TABLE     o   CREATE TABLE public.tipo (
    id integer NOT NULL,
    preco numeric(5,2),
    descr character varying(50)
);
    DROP TABLE public.tipo;
       public         heap    postgres    false            �            1259    16403    tipo_id_seq    SEQUENCE     �   CREATE SEQUENCE public.tipo_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 "   DROP SEQUENCE public.tipo_id_seq;
       public          postgres    false    215            J           0    0    tipo_id_seq    SEQUENCE OWNED BY     ;   ALTER SEQUENCE public.tipo_id_seq OWNED BY public.tipo.id;
          public          postgres    false    216            �            1259    16404    usuario    TABLE     �   CREATE TABLE public.usuario (
    id integer NOT NULL,
    username character varying(50),
    password character varying(80)
);
    DROP TABLE public.usuario;
       public         heap    postgres    false            �            1259    16407    usuario_id_seq    SEQUENCE     �   CREATE SEQUENCE public.usuario_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 %   DROP SEQUENCE public.usuario_id_seq;
       public          postgres    false    217            K           0    0    usuario_id_seq    SEQUENCE OWNED BY     A   ALTER SEQUENCE public.usuario_id_seq OWNED BY public.usuario.id;
          public          postgres    false    218            �            1259    16408    vaga    TABLE     J   CREATE TABLE public.vaga (
    id integer NOT NULL,
    estado boolean
);
    DROP TABLE public.vaga;
       public         heap    postgres    false            �            1259    16411    vaga_id_seq    SEQUENCE     �   CREATE SEQUENCE public.vaga_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 "   DROP SEQUENCE public.vaga_id_seq;
       public          postgres    false    219            L           0    0    vaga_id_seq    SEQUENCE OWNED BY     ;   ALTER SEQUENCE public.vaga_id_seq OWNED BY public.vaga.id;
          public          postgres    false    220            �           2604    16412    carro id    DEFAULT     d   ALTER TABLE ONLY public.carro ALTER COLUMN id SET DEFAULT nextval('public.carro_id_seq'::regclass);
 7   ALTER TABLE public.carro ALTER COLUMN id DROP DEFAULT;
       public          postgres    false    210    209            �           2604    16413 
   cliente id    DEFAULT     h   ALTER TABLE ONLY public.cliente ALTER COLUMN id SET DEFAULT nextval('public.cliente_id_seq'::regclass);
 9   ALTER TABLE public.cliente ALTER COLUMN id DROP DEFAULT;
       public          postgres    false    212    211            �           2604    16414 	   ticket id    DEFAULT     f   ALTER TABLE ONLY public.ticket ALTER COLUMN id SET DEFAULT nextval('public.ticket_id_seq'::regclass);
 8   ALTER TABLE public.ticket ALTER COLUMN id DROP DEFAULT;
       public          postgres    false    214    213            �           2604    16415    tipo id    DEFAULT     b   ALTER TABLE ONLY public.tipo ALTER COLUMN id SET DEFAULT nextval('public.tipo_id_seq'::regclass);
 6   ALTER TABLE public.tipo ALTER COLUMN id DROP DEFAULT;
       public          postgres    false    216    215            �           2604    16416 
   usuario id    DEFAULT     h   ALTER TABLE ONLY public.usuario ALTER COLUMN id SET DEFAULT nextval('public.usuario_id_seq'::regclass);
 9   ALTER TABLE public.usuario ALTER COLUMN id DROP DEFAULT;
       public          postgres    false    218    217            �           2604    16417    vaga id    DEFAULT     b   ALTER TABLE ONLY public.vaga ALTER COLUMN id SET DEFAULT nextval('public.vaga_id_seq'::regclass);
 6   ALTER TABLE public.vaga ALTER COLUMN id DROP DEFAULT;
       public          postgres    false    220    219            5          0    16388    carro 
   TABLE DATA           6   COPY public.carro (id, placa, cliente_id) FROM stdin;
    public          postgres    false    209   �<       7          0    16392    cliente 
   TABLE DATA           :   COPY public.cliente (id, nome, cpf, telefone) FROM stdin;
    public          postgres    false    211   �<       9          0    16396    ticket 
   TABLE DATA           n   COPY public.ticket (id, carro_id, vaga_id, tipo_id, hora_entrada, estado, hora_saida, total_pago) FROM stdin;
    public          postgres    false    213   >=       ;          0    16400    tipo 
   TABLE DATA           0   COPY public.tipo (id, preco, descr) FROM stdin;
    public          postgres    false    215   �=       =          0    16404    usuario 
   TABLE DATA           9   COPY public.usuario (id, username, password) FROM stdin;
    public          postgres    false    217   >       ?          0    16408    vaga 
   TABLE DATA           *   COPY public.vaga (id, estado) FROM stdin;
    public          postgres    false    219   g>       M           0    0    carro_id_seq    SEQUENCE SET     :   SELECT pg_catalog.setval('public.carro_id_seq', 2, true);
          public          postgres    false    210            N           0    0    cliente_id_seq    SEQUENCE SET     <   SELECT pg_catalog.setval('public.cliente_id_seq', 2, true);
          public          postgres    false    212            O           0    0    ticket_id_seq    SEQUENCE SET     <   SELECT pg_catalog.setval('public.ticket_id_seq', 10, true);
          public          postgres    false    214            P           0    0    tipo_id_seq    SEQUENCE SET     9   SELECT pg_catalog.setval('public.tipo_id_seq', 3, true);
          public          postgres    false    216            Q           0    0    usuario_id_seq    SEQUENCE SET     <   SELECT pg_catalog.setval('public.usuario_id_seq', 2, true);
          public          postgres    false    218            R           0    0    vaga_id_seq    SEQUENCE SET     :   SELECT pg_catalog.setval('public.vaga_id_seq', 22, true);
          public          postgres    false    220            �           2606    16419    carro carro_pkey 
   CONSTRAINT     N   ALTER TABLE ONLY public.carro
    ADD CONSTRAINT carro_pkey PRIMARY KEY (id);
 :   ALTER TABLE ONLY public.carro DROP CONSTRAINT carro_pkey;
       public            postgres    false    209            �           2606    16421    carro carro_placa_key 
   CONSTRAINT     Q   ALTER TABLE ONLY public.carro
    ADD CONSTRAINT carro_placa_key UNIQUE (placa);
 ?   ALTER TABLE ONLY public.carro DROP CONSTRAINT carro_placa_key;
       public            postgres    false    209            �           2606    16423    cliente cliente_cpf_key 
   CONSTRAINT     Q   ALTER TABLE ONLY public.cliente
    ADD CONSTRAINT cliente_cpf_key UNIQUE (cpf);
 A   ALTER TABLE ONLY public.cliente DROP CONSTRAINT cliente_cpf_key;
       public            postgres    false    211            �           2606    16425    cliente cliente_pkey 
   CONSTRAINT     R   ALTER TABLE ONLY public.cliente
    ADD CONSTRAINT cliente_pkey PRIMARY KEY (id);
 >   ALTER TABLE ONLY public.cliente DROP CONSTRAINT cliente_pkey;
       public            postgres    false    211            �           2606    16427    ticket ticket_pkey 
   CONSTRAINT     P   ALTER TABLE ONLY public.ticket
    ADD CONSTRAINT ticket_pkey PRIMARY KEY (id);
 <   ALTER TABLE ONLY public.ticket DROP CONSTRAINT ticket_pkey;
       public            postgres    false    213            �           2606    16429    tipo tipo_pkey 
   CONSTRAINT     L   ALTER TABLE ONLY public.tipo
    ADD CONSTRAINT tipo_pkey PRIMARY KEY (id);
 8   ALTER TABLE ONLY public.tipo DROP CONSTRAINT tipo_pkey;
       public            postgres    false    215            �           2606    16431    usuario usuario_pkey 
   CONSTRAINT     R   ALTER TABLE ONLY public.usuario
    ADD CONSTRAINT usuario_pkey PRIMARY KEY (id);
 >   ALTER TABLE ONLY public.usuario DROP CONSTRAINT usuario_pkey;
       public            postgres    false    217            �           2606    16433    usuario usuario_username_key 
   CONSTRAINT     [   ALTER TABLE ONLY public.usuario
    ADD CONSTRAINT usuario_username_key UNIQUE (username);
 F   ALTER TABLE ONLY public.usuario DROP CONSTRAINT usuario_username_key;
       public            postgres    false    217            �           2606    16435    vaga vaga_pkey 
   CONSTRAINT     L   ALTER TABLE ONLY public.vaga
    ADD CONSTRAINT vaga_pkey PRIMARY KEY (id);
 8   ALTER TABLE ONLY public.vaga DROP CONSTRAINT vaga_pkey;
       public            postgres    false    219            �           2606    16436    carro carro_cliente_id_fkey    FK CONSTRAINT        ALTER TABLE ONLY public.carro
    ADD CONSTRAINT carro_cliente_id_fkey FOREIGN KEY (cliente_id) REFERENCES public.cliente(id);
 E   ALTER TABLE ONLY public.carro DROP CONSTRAINT carro_cliente_id_fkey;
       public          postgres    false    209    211    3227            �           2606    16441    ticket ticket_carro_id_fkey    FK CONSTRAINT     {   ALTER TABLE ONLY public.ticket
    ADD CONSTRAINT ticket_carro_id_fkey FOREIGN KEY (carro_id) REFERENCES public.carro(id);
 E   ALTER TABLE ONLY public.ticket DROP CONSTRAINT ticket_carro_id_fkey;
       public          postgres    false    213    209    3221            �           2606    16446    ticket ticket_tipo_id_fkey    FK CONSTRAINT     x   ALTER TABLE ONLY public.ticket
    ADD CONSTRAINT ticket_tipo_id_fkey FOREIGN KEY (tipo_id) REFERENCES public.tipo(id);
 D   ALTER TABLE ONLY public.ticket DROP CONSTRAINT ticket_tipo_id_fkey;
       public          postgres    false    215    3231    213            �           2606    16451    ticket ticket_vaga_id_fkey    FK CONSTRAINT     x   ALTER TABLE ONLY public.ticket
    ADD CONSTRAINT ticket_vaga_id_fkey FOREIGN KEY (vaga_id) REFERENCES public.vaga(id);
 D   ALTER TABLE ONLY public.ticket DROP CONSTRAINT ticket_vaga_id_fkey;
       public          postgres    false    213    219    3237            5       x�3�t
1�07�4�2���8��b���� T"      7   A   x�3��O*���40601532614�43�42000224�2��*�����wJ�34@(3FU���� �o�      9   �   x�mλ�0�Z�����'�����#�	RV���������)vb�-���9���ڂ�k�a��(:�3Q�AT��+�ae��פuS�C4�'�#hW���u}"J��H�OI�ؕlKֲ�x+A&��52s      ;   :   x�3�4�3��(J=�<_� �H!#�(Q�9��(�˘���@��Y:��b�t� ���      =   ;   x�3��M,I--.N�L�/��L6
+��+�7,K	���2�L�I,��OI-Ô����� FA      ?   @   x����0���0�\K�0���['��ۧ�0����Д&�B̂���������W     