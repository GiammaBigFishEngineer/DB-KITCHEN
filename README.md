# CREATE DB
-- *********************************************
-- * SQL MySQL generation                      
-- *--------------------------------------------
-- * DB-MAIN version: 11.0.2              
-- * Generator date: Sep 20 2021              
-- * Generation date: Thu Apr 25 17:34:41 2024 
-- * LUN file: /home/gianmaria/Scrivania/DB-Kitchen/ER-SCHEMAS/DB_KITCHEN.lun 
-- * Schema: RELATIONS/1 
-- ********************************************* 


-- Database Section
-- ________________ 

create database RELATIONS;
use RELATIONS;


-- Tables Section
-- _____________ 

create table assume_cameriere (
     codice_fiscale_cameriere char(16) not null,
     idRistorante int not null,
     constraint ID_assume_cameriere_ID primary key (idRistorante,codice_fiscale_cameriere));

create table assume_cuoco (
     codice_fiscale_cuoco char(16) not null,
     idRistorante int not null,
     constraint ID_assume_cuoco_ID primary key (idRistorante, codice_fiscale_cuoco));

create table CAMERIERE (
     codice_fiscale_cameriere char(16) not null,
     codice_fiscale char(40) not null,
     constraint ID_CAMERIERE_ID primary key (codice_fiscale_cameriere),
     constraint FKregistra_cameriere_ID unique (codice_fiscale));


create table CATALOGO_PRODOTTI (
     categoria char(40) not null,
     nome char(40) not null,
     constraint ID_CATALOGO_PRODOTTI_ID primary key (nome));

create table composto_dispensa (
     idProdotto int not null,
     idOrdine int not null,
     constraint ID_composto_dispensa_ID primary key (idOrdine, idProdotto));

create table composto_menu (
     id_portata int not null,
     idOrdine int not null,
     constraint ID_composto_menu_ID primary key (idOrdine, id_portata));

create table consuma (
     idProdotto int not null,
     idPreparazione int not null,
     constraint ID_consuma_ID primary key (idProdotto, idPreparazione));

create table CONTO (
     totale float(1) not null,
     ordine int not null,
     idOrdine int not null,
     data date not null,
     constraint ID_CONTO_ID primary key (ordine),
     constraint FKgenera_ID unique (idOrdine));


create table CUOCO (
     codice_fiscale_cuoco char(16) not null,
     codice_fiscale char(40) not null,
     grado char(40) not null,
     constraint ID_CUOCO_ID primary key (codice_fiscale_cuoco),
     constraint FKregistra_cuoco_ID unique (codice_fiscale));

create table DISPENSA (
     idProdotto int not null,
     prezzo float(1) not null,
     data_scadenza date not null,
     data_arrivo date not null,
     temperatura_conservazione int not null,
     nome char(40) not null,
     idRistorante int not null,
     quantita int not null,
     constraint ID_DISPENSA_ID primary key (idProdotto));

create table intollerante (
     nome char(40) not null,
     nome_intolleranza char(40) not null,
     constraint ID_intollerante_ID primary key (nome, nome_intolleranza));

create table INTOLLERANZA (
     nome_intolleranza char(40) not null,
     constraint ID_INTOLLERANZA_ID primary key (nome_intolleranza));



create table MENU (
     prezzo int not null,
     nome_portata char(40) not null,
     id_portata int not null,
     descrizione char(50) not null,
     tempo_preparazione int not null,
     constraint ID_MENU_ID primary key (id_portata));

create table ORDINE (
     idOrdine int not null,
     data date not null,
     orario char(40) not null,
     codice_fiscale_cameriere char(16) not null,
     idRistorante int not null,
     numero_tavolo int not null,
     constraint ID_ORDINE_ID primary key (idOrdine));

create table prepara (
     codice_fiscale_cuoco char(16) not null,
     idPreparazione int not null,
     constraint ID_prepara_ID primary key (idPreparazione, codice_fiscale_cuoco));

create table PREPARAZIONE (
     idPreparazione int AUTO_INCREMENT not null,
     pasto char(40) not null,
     descrizione char(50) not null,
     data date not null,
     id_portata int not null,
     constraint ID_PREPARAZIONE_ID primary key (idPreparazione));

create table ricettario (
     idProdotto int not null,
     id_portata int not null,
     constraint ID_ricettario_ID primary key (id_portata, idProdotto));

create table RISTORANTE (
     idRistorante int not null,
     nomeRistorante char(40) not null,
     via char(40) not null,
     numero_civico char(3) not null,
     citta char(40) not null,
     constraint ID_RISTORANTE_ID primary key (idRistorante));

create table STORICO_DIPENDENTI (
     codice_fiscale char(40) not null,
     nome char(40) not null,
     cognome char(40) not null,
     data_stipula_contratto date not null,
     data_fine_contratto date,
     constraint ID_STORICO_DIPENDENTI_ID primary key (codice_fiscale));

create table TAVOLO (
     idRistorante int not null,
     prenotato char not null,
     max_persone int not null,
     numero_tavolo int not null,
     constraint ID_TAVOLO_ID primary key (idRistorante, numero_tavolo));



-- Constraints Section
-- ___________________ 

alter table assume_cameriere add constraint FKass_RIS_1
     foreign key (idRistorante)
     references RISTORANTE (idRistorante);

alter table assume_cameriere add constraint FKass_CAM_FK
     foreign key (codice_fiscale_cameriere)
     references CAMERIERE (codice_fiscale_cameriere);

alter table assume_cuoco add constraint FKass_RIS
     foreign key (idRistorante)
     references RISTORANTE (idRistorante);

alter table assume_cuoco add constraint FKass_CUO_FK
     foreign key (codice_fiscale_cuoco)
     references CUOCO (codice_fiscale_cuoco);

alter table CAMERIERE add constraint FKregistra_cameriere_FK
     foreign key (codice_fiscale)
     references STORICO_DIPENDENTI (codice_fiscale);

alter table composto_dispensa add constraint FKcom_ORD_1
     foreign key (idOrdine)
     references ORDINE (idOrdine);

alter table composto_dispensa add constraint FKcom_DIS_FK
     foreign key (idProdotto)
     references DISPENSA (idProdotto);

alter table composto_menu add constraint FKcom_ORD
     foreign key (idOrdine)
     references ORDINE (idOrdine);

alter table composto_menu add constraint FKcom_MEN_FK
     foreign key (id_portata)
     references MENU (id_portata);

alter table consuma add constraint FKcon_PRE_FK
     foreign key (idPreparazione)
     references PREPARAZIONE (idPreparazione);

alter table consuma add constraint FKcon_DIS
     foreign key (idProdotto)
     references DISPENSA (idProdotto);

alter table CONTO add constraint FKgenera_FK
     foreign key (idOrdine)
     references ORDINE (idOrdine);

alter table CUOCO add constraint FKregistra_cuoco_FK
     foreign key (codice_fiscale)
     references STORICO_DIPENDENTI (codice_fiscale);

alter table DISPENSA add constraint FKpresenza_alimento_FK
     foreign key (nome)
     references CATALOGO_PRODOTTI (nome);

alter table DISPENSA add constraint FKappartenente_FK
     foreign key (idRistorante)
     references RISTORANTE (idRistorante);

alter table intollerante add constraint FKint_INT_FK
     foreign key (nome_intolleranza)
     references INTOLLERANZA (nome_intolleranza);

alter table intollerante add constraint FKint_CAT
     foreign key (nome)
     references CATALOGO_PRODOTTI (nome);

-- Not implemented
-- alter table MENU add constraint ID_MENU_CHK
--     check(exists(select * from ricettario
--                  where ricettario.id_portata = id_portata)); 

alter table ORDINE add constraint FKregistra_ordine_FK
     foreign key (codice_fiscale_cameriere)
     references CAMERIERE (codice_fiscale_cameriere);

alter table ORDINE add constraint FKeffettua_FK
     foreign key (idRistorante, numero_tavolo)
     references TAVOLO (idRistorante, numero_tavolo);

alter table prepara add constraint FKpre_PRE
     foreign key (idPreparazione)
     references PREPARAZIONE (idPreparazione);

alter table prepara add constraint FKpre_CUO_FK
     foreign key (codice_fiscale_cuoco)
     references CUOCO (codice_fiscale_cuoco);

-- Not implemented
-- alter table PREPARAZIONE add constraint ID_PREPARAZIONE_CHK
--     check(exists(select * from consuma
--                  where consuma.idPreparazione = idPreparazione)); 

alter table PREPARAZIONE add constraint FKproduce_FK
     foreign key (id_portata)
     references MENU (id_portata);

alter table ricettario add constraint FKric_MEN
     foreign key (id_portata)
     references MENU (id_portata);

alter table ricettario add constraint FKric_DIS_FK
     foreign key (idProdotto)
     references DISPENSA (idProdotto);

alter table TAVOLO add constraint FKsede
     foreign key (idRistorante)
     references RISTORANTE (idRistorante);


-- Index Section
-- _____________ 

create unique index ID_assume_cameriere_IND
     on assume_cameriere (idRistorante, codice_fiscale_cameriere);

create index FKass_CAM_IND
     on assume_cameriere (codice_fiscale_cameriere);

create unique index ID_assume_cuoco_IND
     on assume_cuoco (idRistorante, codice_fiscale_cuoco);

create index FKass_CUO_IND
     on assume_cuoco (codice_fiscale_cuoco);

create unique index ID_CAMERIERE_IND
     on CAMERIERE (codice_fiscale_cameriere);

create unique index FKregistra_cameriere_IND
     on CAMERIERE (codice_fiscale);

create unique index ID_CATALOGO_PRODOTTI_IND
     on CATALOGO_PRODOTTI (nome);

create unique index ID_composto_dispensa_IND
     on composto_dispensa (idOrdine, idProdotto);

create index FKcom_DIS_IND
     on composto_dispensa (idProdotto);

create unique index ID_composto_menu_IND
     on composto_menu (idOrdine, id_portata);

create index FKcom_MEN_IND
     on composto_menu (id_portata);

create unique index ID_consuma_IND
     on consuma (idProdotto, idPreparazione);

create index FKcon_PRE_IND
     on consuma (idPreparazione);

create unique index ID_CONTO_IND
     on CONTO (ordine);

create unique index FKgenera_IND
     on CONTO (idOrdine);

create unique index ID_CUOCO_IND
     on CUOCO (codice_fiscale_cuoco);

create unique index FKregistra_cuoco_IND
     on CUOCO (codice_fiscale);

create unique index ID_DISPENSA_IND
     on DISPENSA (idProdotto);

create index FKpresenza_alimento_IND
     on DISPENSA (nome);

create index FKappartenente_IND
     on DISPENSA (idRistorante);

create unique index ID_intollerante_IND
     on intollerante (nome, nome_intolleranza);

create index FKint_INT_IND
     on intollerante (nome_intolleranza);

create unique index ID_INTOLLERANZA_IND
     on INTOLLERANZA (nome_intolleranza);

create unique index ID_MENU_IND
     on MENU (id_portata);

create unique index ID_ORDINE_IND
     on ORDINE (idOrdine);

create index FKregistra_ordine_IND
     on ORDINE (codice_fiscale_cameriere);

create index FKeffettua_IND
     on ORDINE (idRistorante, numero_tavolo);

create unique index ID_prepara_IND
     on prepara (idPreparazione, codice_fiscale_cuoco);

create index FKpre_CUO_IND
     on prepara (codice_fiscale_cuoco);

create unique index ID_PREPARAZIONE_IND
     on PREPARAZIONE (idPreparazione);

create index FKproduce_IND
     on PREPARAZIONE (id_portata);

create unique index ID_ricettario_IND
     on ricettario (id_portata, idProdotto);

create index FKric_DIS_IND
     on ricettario (idProdotto);

create unique index ID_RISTORANTE_IND
     on RISTORANTE (idRistorante);

create unique index ID_STORICO_DIPENDENTI_IND
     on STORICO_DIPENDENTI (codice_fiscale);

create unique index ID_TAVOLO_IND
     on TAVOLO (idRistorante, numero_tavolo);

# START PROGRAM

php -S localhost:8000
