PGDMP     "                    {         	   estaciona    15.2 (Debian 15.2-1.pgdg110+1)    15.2 7    ;           0    0    ENCODING    ENCODING        SET client_encoding = 'UTF8';
                      false            <           0    0 
   STDSTRINGS 
   STDSTRINGS     (   SET standard_conforming_strings = 'on';
                      false            =           0    0 
   SEARCHPATH 
   SEARCHPATH     8   SELECT pg_catalog.set_config('search_path', '', false);
                      false            >           1262    16562 	   estaciona    DATABASE     t   CREATE DATABASE estaciona WITH TEMPLATE = template0 ENCODING = 'UTF8' LOCALE_PROVIDER = libc LOCALE = 'en_US.utf8';
    DROP DATABASE estaciona;
                postgres    false            �            1255    16563    encerrar_ticket(integer)    FUNCTION     ]  CREATE FUNCTION public.encerrar_ticket(ticket_id integer) RETURNS void
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
       public          postgres    false            �            1255    16564 2   inserir_ticket(integer, integer, integer, boolean)    FUNCTION     ]  CREATE FUNCTION public.inserir_ticket(carro integer, vaga_uso integer, tipo integer, estado boolean) RETURNS void
    LANGUAGE plpgsql
    AS $$
begin
	insert into ticket(carro_id, vaga_id, tipo_id, hora_entrada, estado) values (carro, vaga_uso, tipo, CURRENT_TIMESTAMP, estado);
	update vaga set estado = false where vaga.id = vaga_uso;
	
end;
$$;
 d   DROP FUNCTION public.inserir_ticket(carro integer, vaga_uso integer, tipo integer, estado boolean);
       public          postgres    false            �            1259    16565    carro    TABLE     o   CREATE TABLE public.carro (
    id integer NOT NULL,
    placa character varying(7),
    cliente_id integer
);
    DROP TABLE public.carro;
       public         heap    postgres    false            �            1259    16568    carro_id_seq    SEQUENCE     �   CREATE SEQUENCE public.carro_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 #   DROP SEQUENCE public.carro_id_seq;
       public          postgres    false    214            ?           0    0    carro_id_seq    SEQUENCE OWNED BY     =   ALTER SEQUENCE public.carro_id_seq OWNED BY public.carro.id;
          public          postgres    false    215            �            1259    16569    cliente    TABLE     �   CREATE TABLE public.cliente (
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
       public          postgres    false    216            @           0    0    cliente_id_seq    SEQUENCE OWNED BY     A   ALTER SEQUENCE public.cliente_id_seq OWNED BY public.cliente.id;
          public          postgres    false    217            �            1259    16573    ticket    TABLE       CREATE TABLE public.ticket (
    id integer NOT NULL,
    carro_id integer,
    vaga_id integer,
    tipo_id integer,
    hora_entrada timestamp without time zone,
    estado boolean,
    hora_saida timestamp without time zone,
    total_pago numeric(9,2)
);
    DROP TABLE public.ticket;
       public         heap    postgres    false            �            1259    16576    ticket_id_seq    SEQUENCE     �   CREATE SEQUENCE public.ticket_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 $   DROP SEQUENCE public.ticket_id_seq;
       public          postgres    false    218            A           0    0    ticket_id_seq    SEQUENCE OWNED BY     ?   ALTER SEQUENCE public.ticket_id_seq OWNED BY public.ticket.id;
          public          postgres    false    219            �            1259    16577    tipo    TABLE     o   CREATE TABLE public.tipo (
    id integer NOT NULL,
    preco numeric(5,2),
    descr character varying(50)
);
    DROP TABLE public.tipo;
       public         heap    postgres    false            �            1259    16580    tipo_id_seq    SEQUENCE     �   CREATE SEQUENCE public.tipo_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 "   DROP SEQUENCE public.tipo_id_seq;
       public          postgres    false    220            B           0    0    tipo_id_seq    SEQUENCE OWNED BY     ;   ALTER SEQUENCE public.tipo_id_seq OWNED BY public.tipo.id;
          public          postgres    false    221            �            1259    16581    usuario    TABLE     �   CREATE TABLE public.usuario (
    id integer NOT NULL,
    username character varying(50),
    password character varying(80)
);
    DROP TABLE public.usuario;
       public         heap    postgres    false            �            1259    16584    usuario_id_seq    SEQUENCE     �   CREATE SEQUENCE public.usuario_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 %   DROP SEQUENCE public.usuario_id_seq;
       public          postgres    false    222            C           0    0    usuario_id_seq    SEQUENCE OWNED BY     A   ALTER SEQUENCE public.usuario_id_seq OWNED BY public.usuario.id;
          public          postgres    false    223            �            1259    16585    vaga    TABLE     J   CREATE TABLE public.vaga (
    id integer NOT NULL,
    estado boolean
);
    DROP TABLE public.vaga;
       public         heap    postgres    false            �            1259    16588    vaga_id_seq    SEQUENCE     �   CREATE SEQUENCE public.vaga_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 "   DROP SEQUENCE public.vaga_id_seq;
       public          postgres    false    224            D           0    0    vaga_id_seq    SEQUENCE OWNED BY     ;   ALTER SEQUENCE public.vaga_id_seq OWNED BY public.vaga.id;
          public          postgres    false    225            �           2604    16589    carro id    DEFAULT     d   ALTER TABLE ONLY public.carro ALTER COLUMN id SET DEFAULT nextval('public.carro_id_seq'::regclass);
 7   ALTER TABLE public.carro ALTER COLUMN id DROP DEFAULT;
       public          postgres    false    215    214            �           2604    16590 
   cliente id    DEFAULT     h   ALTER TABLE ONLY public.cliente ALTER COLUMN id SET DEFAULT nextval('public.cliente_id_seq'::regclass);
 9   ALTER TABLE public.cliente ALTER COLUMN id DROP DEFAULT;
       public          postgres    false    217    216            �           2604    16591 	   ticket id    DEFAULT     f   ALTER TABLE ONLY public.ticket ALTER COLUMN id SET DEFAULT nextval('public.ticket_id_seq'::regclass);
 8   ALTER TABLE public.ticket ALTER COLUMN id DROP DEFAULT;
       public          postgres    false    219    218            �           2604    16592    tipo id    DEFAULT     b   ALTER TABLE ONLY public.tipo ALTER COLUMN id SET DEFAULT nextval('public.tipo_id_seq'::regclass);
 6   ALTER TABLE public.tipo ALTER COLUMN id DROP DEFAULT;
       public          postgres    false    221    220            �           2604    16593 
   usuario id    DEFAULT     h   ALTER TABLE ONLY public.usuario ALTER COLUMN id SET DEFAULT nextval('public.usuario_id_seq'::regclass);
 9   ALTER TABLE public.usuario ALTER COLUMN id DROP DEFAULT;
       public          postgres    false    223    222            �           2604    16594    vaga id    DEFAULT     b   ALTER TABLE ONLY public.vaga ALTER COLUMN id SET DEFAULT nextval('public.vaga_id_seq'::regclass);
 6   ALTER TABLE public.vaga ALTER COLUMN id DROP DEFAULT;
       public          postgres    false    225    224            -          0    16565    carro 
   TABLE DATA           6   COPY public.carro (id, placa, cliente_id) FROM stdin;
    public          postgres    false    214   �<       /          0    16569    cliente 
   TABLE DATA           :   COPY public.cliente (id, nome, cpf, telefone) FROM stdin;
    public          postgres    false    216   3=       1          0    16573    ticket 
   TABLE DATA           n   COPY public.ticket (id, carro_id, vaga_id, tipo_id, hora_entrada, estado, hora_saida, total_pago) FROM stdin;
    public          postgres    false    218   �=       3          0    16577    tipo 
   TABLE DATA           0   COPY public.tipo (id, preco, descr) FROM stdin;
    public          postgres    false    220   z>       5          0    16581    usuario 
   TABLE DATA           9   COPY public.usuario (id, username, password) FROM stdin;
    public          postgres    false    222   �>       7          0    16585    vaga 
   TABLE DATA           *   COPY public.vaga (id, estado) FROM stdin;
    public          postgres    false    224   ?       E           0    0    carro_id_seq    SEQUENCE SET     :   SELECT pg_catalog.setval('public.carro_id_seq', 4, true);
          public          postgres    false    215            F           0    0    cliente_id_seq    SEQUENCE SET     <   SELECT pg_catalog.setval('public.cliente_id_seq', 5, true);
          public          postgres    false    217            G           0    0    ticket_id_seq    SEQUENCE SET     <   SELECT pg_catalog.setval('public.ticket_id_seq', 13, true);
          public          postgres    false    219            H           0    0    tipo_id_seq    SEQUENCE SET     9   SELECT pg_catalog.setval('public.tipo_id_seq', 4, true);
          public          postgres    false    221            I           0    0    usuario_id_seq    SEQUENCE SET     <   SELECT pg_catalog.setval('public.usuario_id_seq', 2, true);
          public          postgres    false    223            J           0    0    vaga_id_seq    SEQUENCE SET     :   SELECT pg_catalog.setval('public.vaga_id_seq', 24, true);
          public          postgres    false    225            �           2606    16596    carro carro_pkey 
   CONSTRAINT     N   ALTER TABLE ONLY public.carro
    ADD CONSTRAINT carro_pkey PRIMARY KEY (id);
 :   ALTER TABLE ONLY public.carro DROP CONSTRAINT carro_pkey;
       public            postgres    false    214            �           2606    16598    carro carro_placa_key 
   CONSTRAINT     Q   ALTER TABLE ONLY public.carro
    ADD CONSTRAINT carro_placa_key UNIQUE (placa);
 ?   ALTER TABLE ONLY public.carro DROP CONSTRAINT carro_placa_key;
       public            postgres    false    214            �           2606    16600    cliente cliente_cpf_key 
   CONSTRAINT     Q   ALTER TABLE ONLY public.cliente
    ADD CONSTRAINT cliente_cpf_key UNIQUE (cpf);
 A   ALTER TABLE ONLY public.cliente DROP CONSTRAINT cliente_cpf_key;
       public            postgres    false    216            �           2606    16602    cliente cliente_pkey 
   CONSTRAINT     R   ALTER TABLE ONLY public.cliente
    ADD CONSTRAINT cliente_pkey PRIMARY KEY (id);
 >   ALTER TABLE ONLY public.cliente DROP CONSTRAINT cliente_pkey;
       public            postgres    false    216            �           2606    16604    ticket ticket_pkey 
   CONSTRAINT     P   ALTER TABLE ONLY public.ticket
    ADD CONSTRAINT ticket_pkey PRIMARY KEY (id);
 <   ALTER TABLE ONLY public.ticket DROP CONSTRAINT ticket_pkey;
       public            postgres    false    218            �           2606    16606    tipo tipo_pkey 
   CONSTRAINT     L   ALTER TABLE ONLY public.tipo
    ADD CONSTRAINT tipo_pkey PRIMARY KEY (id);
 8   ALTER TABLE ONLY public.tipo DROP CONSTRAINT tipo_pkey;
       public            postgres    false    220            �           2606    16608    usuario usuario_pkey 
   CONSTRAINT     R   ALTER TABLE ONLY public.usuario
    ADD CONSTRAINT usuario_pkey PRIMARY KEY (id);
 >   ALTER TABLE ONLY public.usuario DROP CONSTRAINT usuario_pkey;
       public            postgres    false    222            �           2606    16610    usuario usuario_username_key 
   CONSTRAINT     [   ALTER TABLE ONLY public.usuario
    ADD CONSTRAINT usuario_username_key UNIQUE (username);
 F   ALTER TABLE ONLY public.usuario DROP CONSTRAINT usuario_username_key;
       public            postgres    false    222            �           2606    16612    vaga vaga_pkey 
   CONSTRAINT     L   ALTER TABLE ONLY public.vaga
    ADD CONSTRAINT vaga_pkey PRIMARY KEY (id);
 8   ALTER TABLE ONLY public.vaga DROP CONSTRAINT vaga_pkey;
       public            postgres    false    224            �           2606    16613    carro carro_cliente_id_fkey    FK CONSTRAINT        ALTER TABLE ONLY public.carro
    ADD CONSTRAINT carro_cliente_id_fkey FOREIGN KEY (cliente_id) REFERENCES public.cliente(id);
 E   ALTER TABLE ONLY public.carro DROP CONSTRAINT carro_cliente_id_fkey;
       public          postgres    false    214    216    3216            �           2606    16618    ticket ticket_carro_id_fkey    FK CONSTRAINT     {   ALTER TABLE ONLY public.ticket
    ADD CONSTRAINT ticket_carro_id_fkey FOREIGN KEY (carro_id) REFERENCES public.carro(id);
 E   ALTER TABLE ONLY public.ticket DROP CONSTRAINT ticket_carro_id_fkey;
       public          postgres    false    218    3210    214            �           2606    16623    ticket ticket_tipo_id_fkey    FK CONSTRAINT     x   ALTER TABLE ONLY public.ticket
    ADD CONSTRAINT ticket_tipo_id_fkey FOREIGN KEY (tipo_id) REFERENCES public.tipo(id);
 D   ALTER TABLE ONLY public.ticket DROP CONSTRAINT ticket_tipo_id_fkey;
       public          postgres    false    220    218    3220            �           2606    16628    ticket ticket_vaga_id_fkey    FK CONSTRAINT     x   ALTER TABLE ONLY public.ticket
    ADD CONSTRAINT ticket_vaga_id_fkey FOREIGN KEY (vaga_id) REFERENCES public.vaga(id);
 D   ALTER TABLE ONLY public.ticket DROP CONSTRAINT ticket_vaga_id_fkey;
       public          postgres    false    218    3226    224            -   5   x�3�t
1�07�4�2���8���9�B�,�M��&�%��%��\1z\\\ -
      /   m   x�U�1�@k�� Z��iIG	-�%"��H�����V�����ܒP`^��(�~P ���t�支v�X��@�������ȯ���>:�m�ͱ+΃[�b��yez�      1   �   x�m�Ar!е��/0�/
�eֹ���,:�)�}|���_���*]吡s�پ>�,��"�h*@_O�P�e�j㆘^�e�R�I�)�z|(��(�,`�Awbw�֡�#^c��4�S��)���G�;�]Y�F�Bd�O+��èC|���E��O�Cl���L��(�epom?�$���-��o��L�      3   E   x�3�4�3��(J=�<_� �H!#�(Q�9��(��(ia�!�_��e�ibb�g`��Z\������ ��      5   ;   x�3��M,I--.N�L�/��L6
+��+�7,K	���2�L�I,��OI-Ô����� FA      7   D   x����0��a��m���1��r�aK C�?Ns��<�5JT�FD��B�"N�$�=G�Q�8�oF�{�0     