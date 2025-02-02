PGDMP     -    +        
        {            upwork_school    15.2    15.2 9    B           0    0    ENCODING    ENCODING        SET client_encoding = 'UTF8';
                      false            C           0    0 
   STDSTRINGS 
   STDSTRINGS     (   SET standard_conforming_strings = 'on';
                      false            D           0    0 
   SEARCHPATH 
   SEARCHPATH     8   SELECT pg_catalog.set_config('search_path', '', false);
                      false            E           1262    28403    upwork_school    DATABASE     �   CREATE DATABASE upwork_school WITH TEMPLATE = template0 ENCODING = 'UTF8' LOCALE_PROVIDER = libc LOCALE = 'English_United States.1252';
    DROP DATABASE upwork_school;
                postgres    false            �            1259    28404    lisenece    TABLE     p   CREATE TABLE public.lisenece (
    id integer NOT NULL,
    lisenece text,
    status character varying(255)
);
    DROP TABLE public.lisenece;
       public         heap    postgres    false            �            1259    28409    lisenece_id_seq    SEQUENCE     �   CREATE SEQUENCE public.lisenece_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 &   DROP SEQUENCE public.lisenece_id_seq;
       public          postgres    false    214            F           0    0    lisenece_id_seq    SEQUENCE OWNED BY     C   ALTER SEQUENCE public.lisenece_id_seq OWNED BY public.lisenece.id;
          public          postgres    false    215            �            1259    28410    logtime    TABLE     �   CREATE TABLE public.logtime (
    id integer NOT NULL,
    email character varying(255) NOT NULL,
    last_login timestamp without time zone NOT NULL
);
    DROP TABLE public.logtime;
       public         heap    postgres    false            �            1259    28413    logtime_id_seq    SEQUENCE     �   CREATE SEQUENCE public.logtime_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 %   DROP SEQUENCE public.logtime_id_seq;
       public          postgres    false    216            G           0    0    logtime_id_seq    SEQUENCE OWNED BY     A   ALTER SEQUENCE public.logtime_id_seq OWNED BY public.logtime.id;
          public          postgres    false    217            �            1259    28414    privacy    TABLE     n   CREATE TABLE public.privacy (
    id integer NOT NULL,
    privacy text,
    status character varying(255)
);
    DROP TABLE public.privacy;
       public         heap    postgres    false            �            1259    28419    privacy_id_seq    SEQUENCE     �   CREATE SEQUENCE public.privacy_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 %   DROP SEQUENCE public.privacy_id_seq;
       public          postgres    false    218            H           0    0    privacy_id_seq    SEQUENCE OWNED BY     A   ALTER SEQUENCE public.privacy_id_seq OWNED BY public.privacy.id;
          public          postgres    false    219            �            1259    28420    report    TABLE     o   CREATE TABLE public.report (
    id bigint NOT NULL,
    subject text,
    description text,
    email text
);
    DROP TABLE public.report;
       public         heap    postgres    false            �            1259    28425    report_id_seq    SEQUENCE     �   ALTER TABLE public.report ALTER COLUMN id ADD GENERATED ALWAYS AS IDENTITY (
    SEQUENCE NAME public.report_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1
);
            public          postgres    false    220            �            1259    28426 
   savevideos    TABLE     d   CREATE TABLE public.savevideos (
    id bigint NOT NULL,
    video_id bigint,
    user_id bigint
);
    DROP TABLE public.savevideos;
       public         heap    postgres    false            �            1259    28429    savevideos_id_seq    SEQUENCE     �   ALTER TABLE public.savevideos ALTER COLUMN id ADD GENERATED ALWAYS AS IDENTITY (
    SEQUENCE NAME public.savevideos_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1
);
            public          postgres    false    222            �            1259    28430    terms    TABLE     j   CREATE TABLE public.terms (
    id integer NOT NULL,
    terms text,
    status character varying(255)
);
    DROP TABLE public.terms;
       public         heap    postgres    false            �            1259    28435    terms_id_seq    SEQUENCE     �   CREATE SEQUENCE public.terms_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 #   DROP SEQUENCE public.terms_id_seq;
       public          postgres    false    224            I           0    0    terms_id_seq    SEQUENCE OWNED BY     =   ALTER SEQUENCE public.terms_id_seq OWNED BY public.terms.id;
          public          postgres    false    225            �            1259    28436 
   user_notes    TABLE     �   CREATE TABLE public.user_notes (
    id bigint NOT NULL,
    video_id bigint,
    user_id bigint,
    notes text,
    created_at text
);
    DROP TABLE public.user_notes;
       public         heap    postgres    false            �            1259    28441    user_notes_id_seq    SEQUENCE     �   ALTER TABLE public.user_notes ALTER COLUMN id ADD GENERATED ALWAYS AS IDENTITY (
    SEQUENCE NAME public.user_notes_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1
);
            public          postgres    false    226            �            1259    28442    users    TABLE     �   CREATE TABLE public.users (
    id integer NOT NULL,
    email character varying(255),
    first_name text,
    last_name text,
    password text,
    otp text,
    status text,
    address text,
    "time" text,
    email_status text,
    role text
);
    DROP TABLE public.users;
       public         heap    postgres    false            �            1259    28447    users_id_seq    SEQUENCE     �   CREATE SEQUENCE public.users_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 #   DROP SEQUENCE public.users_id_seq;
       public          postgres    false    228            J           0    0    users_id_seq    SEQUENCE OWNED BY     =   ALTER SEQUENCE public.users_id_seq OWNED BY public.users.id;
          public          postgres    false    229            �            1259    28448    videos    TABLE     �   CREATE TABLE public.videos (
    id bigint NOT NULL,
    description text,
    video_link text,
    title text NOT NULL,
    created_at text,
    helpingmaterial text,
    "time" text
);
    DROP TABLE public.videos;
       public         heap    postgres    false            �            1259    28453    videos_id_seq    SEQUENCE     �   ALTER TABLE public.videos ALTER COLUMN id ADD GENERATED ALWAYS AS IDENTITY (
    SEQUENCE NAME public.videos_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    MAXVALUE 1234578912345
    CACHE 1
);
            public          postgres    false    230            �           2604    28495    lisenece id    DEFAULT     j   ALTER TABLE ONLY public.lisenece ALTER COLUMN id SET DEFAULT nextval('public.lisenece_id_seq'::regclass);
 :   ALTER TABLE public.lisenece ALTER COLUMN id DROP DEFAULT;
       public          postgres    false    215    214            �           2604    28496 
   logtime id    DEFAULT     h   ALTER TABLE ONLY public.logtime ALTER COLUMN id SET DEFAULT nextval('public.logtime_id_seq'::regclass);
 9   ALTER TABLE public.logtime ALTER COLUMN id DROP DEFAULT;
       public          postgres    false    217    216            �           2604    28497 
   privacy id    DEFAULT     h   ALTER TABLE ONLY public.privacy ALTER COLUMN id SET DEFAULT nextval('public.privacy_id_seq'::regclass);
 9   ALTER TABLE public.privacy ALTER COLUMN id DROP DEFAULT;
       public          postgres    false    219    218            �           2604    28498    terms id    DEFAULT     d   ALTER TABLE ONLY public.terms ALTER COLUMN id SET DEFAULT nextval('public.terms_id_seq'::regclass);
 7   ALTER TABLE public.terms ALTER COLUMN id DROP DEFAULT;
       public          postgres    false    225    224            �           2604    28499    users id    DEFAULT     d   ALTER TABLE ONLY public.users ALTER COLUMN id SET DEFAULT nextval('public.users_id_seq'::regclass);
 7   ALTER TABLE public.users ALTER COLUMN id DROP DEFAULT;
       public          postgres    false    229    228            .          0    28404    lisenece 
   TABLE DATA           8   COPY public.lisenece (id, lisenece, status) FROM stdin;
    public          postgres    false    214   �:       0          0    28410    logtime 
   TABLE DATA           8   COPY public.logtime (id, email, last_login) FROM stdin;
    public          postgres    false    216   �:       2          0    28414    privacy 
   TABLE DATA           6   COPY public.privacy (id, privacy, status) FROM stdin;
    public          postgres    false    218   ;       4          0    28420    report 
   TABLE DATA           A   COPY public.report (id, subject, description, email) FROM stdin;
    public          postgres    false    220   B;       6          0    28426 
   savevideos 
   TABLE DATA           ;   COPY public.savevideos (id, video_id, user_id) FROM stdin;
    public          postgres    false    222   =       8          0    28430    terms 
   TABLE DATA           2   COPY public.terms (id, terms, status) FROM stdin;
    public          postgres    false    224   z=       :          0    28436 
   user_notes 
   TABLE DATA           N   COPY public.user_notes (id, video_id, user_id, notes, created_at) FROM stdin;
    public          postgres    false    226   �=       <          0    28442    users 
   TABLE DATA           }   COPY public.users (id, email, first_name, last_name, password, otp, status, address, "time", email_status, role) FROM stdin;
    public          postgres    false    228   �A       >          0    28448    videos 
   TABLE DATA           i   COPY public.videos (id, description, video_link, title, created_at, helpingmaterial, "time") FROM stdin;
    public          postgres    false    230   ^B       K           0    0    lisenece_id_seq    SEQUENCE SET     =   SELECT pg_catalog.setval('public.lisenece_id_seq', 1, true);
          public          postgres    false    215            L           0    0    logtime_id_seq    SEQUENCE SET     =   SELECT pg_catalog.setval('public.logtime_id_seq', 84, true);
          public          postgres    false    217            M           0    0    privacy_id_seq    SEQUENCE SET     <   SELECT pg_catalog.setval('public.privacy_id_seq', 1, true);
          public          postgres    false    219            N           0    0    report_id_seq    SEQUENCE SET     <   SELECT pg_catalog.setval('public.report_id_seq', 16, true);
          public          postgres    false    221            O           0    0    savevideos_id_seq    SEQUENCE SET     @   SELECT pg_catalog.setval('public.savevideos_id_seq', 58, true);
          public          postgres    false    223            P           0    0    terms_id_seq    SEQUENCE SET     :   SELECT pg_catalog.setval('public.terms_id_seq', 2, true);
          public          postgres    false    225            Q           0    0    user_notes_id_seq    SEQUENCE SET     A   SELECT pg_catalog.setval('public.user_notes_id_seq', 148, true);
          public          postgres    false    227            R           0    0    users_id_seq    SEQUENCE SET     <   SELECT pg_catalog.setval('public.users_id_seq', 200, true);
          public          postgres    false    229            S           0    0    videos_id_seq    SEQUENCE SET     =   SELECT pg_catalog.setval('public.videos_id_seq', 252, true);
          public          postgres    false    231            �           2606    28460    lisenece lisenece_pkey 
   CONSTRAINT     T   ALTER TABLE ONLY public.lisenece
    ADD CONSTRAINT lisenece_pkey PRIMARY KEY (id);
 @   ALTER TABLE ONLY public.lisenece DROP CONSTRAINT lisenece_pkey;
       public            postgres    false    214            �           2606    28462    logtime logtime_pkey 
   CONSTRAINT     R   ALTER TABLE ONLY public.logtime
    ADD CONSTRAINT logtime_pkey PRIMARY KEY (id);
 >   ALTER TABLE ONLY public.logtime DROP CONSTRAINT logtime_pkey;
       public            postgres    false    216            �           2606    28464    privacy privacy_pkey 
   CONSTRAINT     R   ALTER TABLE ONLY public.privacy
    ADD CONSTRAINT privacy_pkey PRIMARY KEY (id);
 >   ALTER TABLE ONLY public.privacy DROP CONSTRAINT privacy_pkey;
       public            postgres    false    218            �           2606    28466    report report_pkey 
   CONSTRAINT     P   ALTER TABLE ONLY public.report
    ADD CONSTRAINT report_pkey PRIMARY KEY (id);
 <   ALTER TABLE ONLY public.report DROP CONSTRAINT report_pkey;
       public            postgres    false    220            �           2606    28468    terms terms_pkey 
   CONSTRAINT     N   ALTER TABLE ONLY public.terms
    ADD CONSTRAINT terms_pkey PRIMARY KEY (id);
 :   ALTER TABLE ONLY public.terms DROP CONSTRAINT terms_pkey;
       public            postgres    false    224            �           2606    28470    user_notes user_notes_pkey 
   CONSTRAINT     X   ALTER TABLE ONLY public.user_notes
    ADD CONSTRAINT user_notes_pkey PRIMARY KEY (id);
 D   ALTER TABLE ONLY public.user_notes DROP CONSTRAINT user_notes_pkey;
       public            postgres    false    226            �           2606    28472    users users_pkey 
   CONSTRAINT     N   ALTER TABLE ONLY public.users
    ADD CONSTRAINT users_pkey PRIMARY KEY (id);
 :   ALTER TABLE ONLY public.users DROP CONSTRAINT users_pkey;
       public            postgres    false    228            .   !   x�3�L)�ͭT(I�(�LL.�,K����� k��      0   4   x��0�LL���sH�M���K���4202�5��54P0��25�22����� �
�      2   !   x�3�L)�ͭT(I�(�LL.�,K����� k��      4   �  x����N�0E��W�릪��NSu�@��m%@l�&�;�ĥ���c�� KW��3>�|���Lǭ޴qCs}p<������GH&7�:���"��䒝�%_^��7Aa]�1�oO������۲m��:b�Yll�v����r�*Y�|�VW���=CЩ�:����/�j���պr\��Qy�����M	�_�a��Ӓͧ����{y
k6�J���*݄�A�6�֌��㟔F'��:ٔe��a��!�b��a��Fo�� 'A��� 7�8>9�<���ԃ�zpP��A=�� ���C�z	}���0�N	�N	�NI�NI�NI�NI�a��{:� ��ҧi�+K�Gs�9V���z��z�Y�m���Vvn|쀊��VM��]�H�To��2��{1o�:�1�.&�c������3��+h"��{��c2��#;������ŕ�����q���      6   P   x��α� C��&g2�K��#N`ҽS�O���J�PM�Ŗ���b��n���F�BǱ�sG�d�x����}x r�1p      8   !   x�3�L)�ͭT(I�(�LL.�,K����� k��      :     x����r�8���S�r�/��P*�<Bfj.�Bʶ�rd����w�nв	�˾|4�^	�+!\�W���,�?z�R	.��wBO���������+�:p��M�|�ugh/l���ԋ
2����^�#���\,�/ǜ�PA� 3P��"W��;�6(@3#�)ǌ�<3j�GQf��;L3n��P������x�a��dvX{���^��kN��w�7�_%Le��B�-q��cι��2ht�Uto<�����	t��9_�+"�r88�����+I�gޯ�J��ds�{)a(N�Šb��v�v�ٯ���.l {�ǲeN�ѠtAs!&���̙�"g�8l�1�9�Lu~���C�P��b��T��Y=<b���ǒ	J$�7}&m��.Yzl�̿��KN�	��m��}�~,�հ'�"�:��Ӏ�
0�^�Et��a���v�j�:�UT7\bt��T��:�x���Ab��.%�=��6x,�>!�?��� pF�@�)�=ko(I+��w�p��O�Ɩ\uڥ���N�-���F��� �!�`>�Ff�4T�!�M�+�%��H�:[%J�b傹��M�����I��g���f��4-7I9!�e�\�-�2��J��b֛��@A��Ŋ�oV@oȽ.�;@�h[��:�d�Kd�E�b$��3�Kv�#d��J�Lڕ���@��wя.,�#�\ؠ���ڴM��"�0��ヰ)9k�/%� �N�?`�H��|�b+���^@��@��R�8�1/��P���
@�2S˫�`�qݗn
��������YRAe���F=(H��ŬS"E���ظ���)�w�7[�FT����Ի��l@�Ceu����X:<������SJaش��>�����Z�@aܔ<�_�%�� ����Uw���bG���yG��F�������)�GR��z'�P�X�Z�`��p8�K��{�V)����v���kY� z�N-noo��n���f��~���ﲩ���G���\Ǳ�q;!]l
�� �?2����|�      <   �   x�34��LL���sH�M���K���t񡤡�1g�'P� '�$5ā G.#δĒ����Ҝ3c$3 � 	L3�Lt-�uMt�u-\t]\8���u,t�L-��,���8S��R9C�b���� l�.�      >      x������ � �     