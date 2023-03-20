PGDMP     ,    #                 {         	   estaciona    14.5 (Debian 14.5-1.pgdg110+1)    14.7 8    0           0    0    ENCODING    ENCODING        SET client_encoding = 'UTF8';
                      false            1           0    0 
   STDSTRINGS 
   STDSTRINGS     (   SET standard_conforming_strings = 'on';
                      false            2           0    0 
   SEARCHPATH 
   SEARCHPATH     8   SELECT pg_catalog.set_config('search_path', '', false);
                      false            3           1262    16564 	   estaciona    DATABASE     ]   CREATE DATABASE estaciona WITH TEMPLATE = template0 ENCODING = 'UTF8' LOCALE = 'en_US.utf8';
    DROP DATABASE estaciona;
                postgres    false            �            1255    16645    encerrar_ticket(integer)    FUNCTION     ]  CREATE FUNCTION public.encerrar_ticket(ticket_id integer) RETURNS void
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
       public          postgres    false            �            1255    16644 3   encerrar_ticket(integer, integer, boolean, integer)    FUNCTION     (  CREATE FUNCTION public.encerrar_ticket(ticket_id integer, vaga_uso integer, estado boolean, preco_id integer) RETURNS void
    LANGUAGE plpgsql
    AS $$
begin
	
	update ticket set estado = false where ticket_id = ticket.id;
	update ticket set hora_saida = current_timestamp where ticket_id = ticket.id;
	update ticket set total_pago = (EXTRACT(EPOCH FROM hora_saida) - EXTRACT(EPOCH FROM hora_entrada))/3600
	* 
	(select preco from tipo where 1 = tipo.id) where ticket.id =preco_id;
	update vaga set estado = true where vaga.id = vaga_uso;
	
end;
$$;
 m   DROP FUNCTION public.encerrar_ticket(ticket_id integer, vaga_uso integer, estado boolean, preco_id integer);
       public          postgres    false            �            1255    16630 2   inserir_ticket(integer, integer, integer, boolean)    FUNCTION     ]  CREATE FUNCTION public.inserir_ticket(carro integer, vaga_uso integer, tipo integer, estado boolean) RETURNS void
    LANGUAGE plpgsql
    AS $$
begin
	insert into ticket(carro_id, vaga_id, tipo_id, hora_entrada, estado) values (carro, vaga_uso, tipo, CURRENT_TIMESTAMP, estado);
	update vaga set estado = false where vaga.id = vaga_uso;
	
end;
$$;
 d   DROP FUNCTION public.inserir_ticket(carro integer, vaga_uso integer, tipo integer, estado boolean);
       public          postgres    false            �            1259    16580    carro    TABLE     o   CREATE TABLE public.carro (
    id integer NOT NULL,
    placa character varying(7),
    cliente_id integer
);
    DROP TABLE public.carro;
       public         heap    postgres    false            �            1259    16579    carro_id_seq    SEQUENCE     �   CREATE SEQUENCE public.carro_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 #   DROP SEQUENCE public.carro_id_seq;
       public          postgres    false    214            4           0    0    carro_id_seq    SEQUENCE OWNED BY     =   ALTER SEQUENCE public.carro_id_seq OWNED BY public.carro.id;
          public          postgres    false    213            �            1259    16573    cliente    TABLE     �   CREATE TABLE public.cliente (
    id integer NOT NULL,
    nome character varying(50),
    cpf character varying(11),
    telefone character varying(11)
);
    DROP TABLE public.cliente;
       public         heap    postgres    false            �            1259    16572    cliente_id_seq    SEQUENCE     �   CREATE SEQUENCE public.cliente_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 %   DROP SEQUENCE public.cliente_id_seq;
       public          postgres    false    212            5           0    0    cliente_id_seq    SEQUENCE OWNED BY     A   ALTER SEQUENCE public.cliente_id_seq OWNED BY public.cliente.id;
          public          postgres    false    211            �            1259    16599    ticket    TABLE       CREATE TABLE public.ticket (
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
       public         heap    postgres    false            �            1259    16598    ticket_id_seq    SEQUENCE     �   CREATE SEQUENCE public.ticket_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 $   DROP SEQUENCE public.ticket_id_seq;
       public          postgres    false    218            6           0    0    ticket_id_seq    SEQUENCE OWNED BY     ?   ALTER SEQUENCE public.ticket_id_seq OWNED BY public.ticket.id;
          public          postgres    false    217            �            1259    16592    tipo    TABLE     o   CREATE TABLE public.tipo (
    id integer NOT NULL,
    preco numeric(5,2),
    descr character varying(50)
);
    DROP TABLE public.tipo;
       public         heap    postgres    false            �            1259    16591    tipo_id_seq    SEQUENCE     �   CREATE SEQUENCE public.tipo_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 "   DROP SEQUENCE public.tipo_id_seq;
       public          postgres    false    216            7           0    0    tipo_id_seq    SEQUENCE OWNED BY     ;   ALTER SEQUENCE public.tipo_id_seq OWNED BY public.tipo.id;
          public          postgres    false    215            �            1259    16635    usuario    TABLE     �   CREATE TABLE public.usuario (
    id integer NOT NULL,
    username character varying(50),
    password character varying(80)
);
    DROP TABLE public.usuario;
       public         heap    postgres    false            �            1259    16634    usuario_id_seq    SEQUENCE     �   CREATE SEQUENCE public.usuario_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 %   DROP SEQUENCE public.usuario_id_seq;
       public          postgres    false    220            8           0    0    usuario_id_seq    SEQUENCE OWNED BY     A   ALTER SEQUENCE public.usuario_id_seq OWNED BY public.usuario.id;
          public          postgres    false    219            �            1259    16566    vaga    TABLE     J   CREATE TABLE public.vaga (
    id integer NOT NULL,
    estado boolean
);
    DROP TABLE public.vaga;
       public         heap    postgres    false            �            1259    16565    vaga_id_seq    SEQUENCE     �   CREATE SEQUENCE public.vaga_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 "   DROP SEQUENCE public.vaga_id_seq;
       public          postgres    false    210            9           0    0    vaga_id_seq    SEQUENCE OWNED BY     ;   ALTER SEQUENCE public.vaga_id_seq OWNED BY public.vaga.id;
          public          postgres    false    209            }           2604    16583    carro id    DEFAULT     d   ALTER TABLE ONLY public.carro ALTER COLUMN id SET DEFAULT nextval('public.carro_id_seq'::regclass);
 7   ALTER TABLE public.carro ALTER COLUMN id DROP DEFAULT;
       public          postgres    false    213    214    214            |           2604    16576 
   cliente id    DEFAULT     h   ALTER TABLE ONLY public.cliente ALTER COLUMN id SET DEFAULT nextval('public.cliente_id_seq'::regclass);
 9   ALTER TABLE public.cliente ALTER COLUMN id DROP DEFAULT;
       public          postgres    false    212    211    212                       2604    16602 	   ticket id    DEFAULT     f   ALTER TABLE ONLY public.ticket ALTER COLUMN id SET DEFAULT nextval('public.ticket_id_seq'::regclass);
 8   ALTER TABLE public.ticket ALTER COLUMN id DROP DEFAULT;
       public          postgres    false    218    217    218            ~           2604    16595    tipo id    DEFAULT     b   ALTER TABLE ONLY public.tipo ALTER COLUMN id SET DEFAULT nextval('public.tipo_id_seq'::regclass);
 6   ALTER TABLE public.tipo ALTER COLUMN id DROP DEFAULT;
       public          postgres    false    216    215    216            �           2604    16638 
   usuario id    DEFAULT     h   ALTER TABLE ONLY public.usuario ALTER COLUMN id SET DEFAULT nextval('public.usuario_id_seq'::regclass);
 9   ALTER TABLE public.usuario ALTER COLUMN id DROP DEFAULT;
       public          postgres    false    219    220    220            {           2604    16569    vaga id    DEFAULT     b   ALTER TABLE ONLY public.vaga ALTER COLUMN id SET DEFAULT nextval('public.vaga_id_seq'::regclass);
 6   ALTER TABLE public.vaga ALTER COLUMN id DROP DEFAULT;
       public          postgres    false    209    210    210            '          0    16580    carro 
   TABLE DATA           6   COPY public.carro (id, placa, cliente_id) FROM stdin;
    public          postgres    false    214   L@       %          0    16573    cliente 
   TABLE DATA           :   COPY public.cliente (id, nome, cpf, telefone) FROM stdin;
    public          postgres    false    212   |@       +          0    16599    ticket 
   TABLE DATA           n   COPY public.ticket (id, carro_id, vaga_id, tipo_id, hora_entrada, estado, hora_saida, total_pago) FROM stdin;
    public          postgres    false    218   �@       )          0    16592    tipo 
   TABLE DATA           0   COPY public.tipo (id, preco, descr) FROM stdin;
    public          postgres    false    216   aA       -          0    16635    usuario 
   TABLE DATA           9   COPY public.usuario (id, username, password) FROM stdin;
    public          postgres    false    220   �A       #          0    16566    vaga 
   TABLE DATA           *   COPY public.vaga (id, estado) FROM stdin;
    public          postgres    false    210   �A       :           0    0    carro_id_seq    SEQUENCE SET     :   SELECT pg_catalog.setval('public.carro_id_seq', 2, true);
          public          postgres    false    213            ;           0    0    cliente_id_seq    SEQUENCE SET     <   SELECT pg_catalog.setval('public.cliente_id_seq', 2, true);
          public          postgres    false    211            <           0    0    ticket_id_seq    SEQUENCE SET     <   SELECT pg_catalog.setval('public.ticket_id_seq', 10, true);
          public          postgres    false    217            =           0    0    tipo_id_seq    SEQUENCE SET     9   SELECT pg_catalog.setval('public.tipo_id_seq', 3, true);
          public          postgres    false    215            >           0    0    usuario_id_seq    SEQUENCE SET     <   SELECT pg_catalog.setval('public.usuario_id_seq', 2, true);
          public          postgres    false    219            ?           0    0    vaga_id_seq    SEQUENCE SET     :   SELECT pg_catalog.setval('public.vaga_id_seq', 22, true);
          public          postgres    false    209            �           2606    16585    carro carro_pkey 
   CONSTRAINT     N   ALTER TABLE ONLY public.carro
    ADD CONSTRAINT carro_pkey PRIMARY KEY (id);
 :   ALTER TABLE ONLY public.carro DROP CONSTRAINT carro_pkey;
       public            postgres    false    214            �           2606    16623    carro carro_placa_key 
   CONSTRAINT     Q   ALTER TABLE ONLY public.carro
    ADD CONSTRAINT carro_placa_key UNIQUE (placa);
 ?   ALTER TABLE ONLY public.carro DROP CONSTRAINT carro_placa_key;
       public            postgres    false    214            �           2606    16621    cliente cliente_cpf_key 
   CONSTRAINT     Q   ALTER TABLE ONLY public.cliente
    ADD CONSTRAINT cliente_cpf_key UNIQUE (cpf);
 A   ALTER TABLE ONLY public.cliente DROP CONSTRAINT cliente_cpf_key;
       public            postgres    false    212            �           2606    16578    cliente cliente_pkey 
   CONSTRAINT     R   ALTER TABLE ONLY public.cliente
    ADD CONSTRAINT cliente_pkey PRIMARY KEY (id);
 >   ALTER TABLE ONLY public.cliente DROP CONSTRAINT cliente_pkey;
       public            postgres    false    212            �           2606    16604    ticket ticket_pkey 
   CONSTRAINT     P   ALTER TABLE ONLY public.ticket
    ADD CONSTRAINT ticket_pkey PRIMARY KEY (id);
 <   ALTER TABLE ONLY public.ticket DROP CONSTRAINT ticket_pkey;
       public            postgres    false    218            �           2606    16597    tipo tipo_pkey 
   CONSTRAINT     L   ALTER TABLE ONLY public.tipo
    ADD CONSTRAINT tipo_pkey PRIMARY KEY (id);
 8   ALTER TABLE ONLY public.tipo DROP CONSTRAINT tipo_pkey;
       public            postgres    false    216            �           2606    16640    usuario usuario_pkey 
   CONSTRAINT     R   ALTER TABLE ONLY public.usuario
    ADD CONSTRAINT usuario_pkey PRIMARY KEY (id);
 >   ALTER TABLE ONLY public.usuario DROP CONSTRAINT usuario_pkey;
       public            postgres    false    220            �           2606    16642    usuario usuario_username_key 
   CONSTRAINT     [   ALTER TABLE ONLY public.usuario
    ADD CONSTRAINT usuario_username_key UNIQUE (username);
 F   ALTER TABLE ONLY public.usuario DROP CONSTRAINT usuario_username_key;
       public            postgres    false    220            �           2606    16571    vaga vaga_pkey 
   CONSTRAINT     L   ALTER TABLE ONLY public.vaga
    ADD CONSTRAINT vaga_pkey PRIMARY KEY (id);
 8   ALTER TABLE ONLY public.vaga DROP CONSTRAINT vaga_pkey;
       public            postgres    false    210            �           2606    16586    carro carro_cliente_id_fkey    FK CONSTRAINT        ALTER TABLE ONLY public.carro
    ADD CONSTRAINT carro_cliente_id_fkey FOREIGN KEY (cliente_id) REFERENCES public.cliente(id);
 E   ALTER TABLE ONLY public.carro DROP CONSTRAINT carro_cliente_id_fkey;
       public          postgres    false    212    214    3206            �           2606    16605    ticket ticket_carro_id_fkey    FK CONSTRAINT     {   ALTER TABLE ONLY public.ticket
    ADD CONSTRAINT ticket_carro_id_fkey FOREIGN KEY (carro_id) REFERENCES public.carro(id);
 E   ALTER TABLE ONLY public.ticket DROP CONSTRAINT ticket_carro_id_fkey;
       public          postgres    false    214    218    3208            �           2606    16615    ticket ticket_tipo_id_fkey    FK CONSTRAINT     x   ALTER TABLE ONLY public.ticket
    ADD CONSTRAINT ticket_tipo_id_fkey FOREIGN KEY (tipo_id) REFERENCES public.tipo(id);
 D   ALTER TABLE ONLY public.ticket DROP CONSTRAINT ticket_tipo_id_fkey;
       public          postgres    false    218    216    3212            �           2606    16610    ticket ticket_vaga_id_fkey    FK CONSTRAINT     x   ALTER TABLE ONLY public.ticket
    ADD CONSTRAINT ticket_vaga_id_fkey FOREIGN KEY (vaga_id) REFERENCES public.vaga(id);
 D   ALTER TABLE ONLY public.ticket DROP CONSTRAINT ticket_vaga_id_fkey;
       public          postgres    false    210    218    3202            '       x�3�t
1�07�4�2���8��b���� T"      %   A   x�3��O*���40601532614�43�42000224�2��*�����wJ�34@(3FU���� �o�      +   �   x�mλ�0�Z�����'�����#�	RV���������)vb�-���9���ڂ�k�a��(:�3Q�AT��+�ae��פuS�C4�'�#hW���u}"J��H�OI�ؕlKֲ�x+A&��52s      )   :   x�3�4�3��(J=�<_� �H!#�(Q�9��(�˘���@��Y:��b�t� ���      -   ;   x�3��M,I--.N�L�/��L6
+��+�7,K	���2�L�I,��OI-Ô����� FA      #   @   x����0���0�\K�0���['��ۧ�0����Д&�B̂���������W     