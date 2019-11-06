/*==============================================================*/
/* Nom de SGBD :  MySQL 5.0                                     */
/* Date de création :  06/11/2019 16:25:17                      */
/*==============================================================*/


drop table if exists ACHETER;

drop table if exists ACTIVITE;

drop table if exists COMMENTAIRE;

drop table if exists PARTICIPER;

drop table if exists PHOTO;

drop table if exists PRODUIT;

drop table if exists UTILISATEUR;

/*==============================================================*/
/* Table : ACHETER                                              */
/*==============================================================*/
create table ACHETER
(
   ID_UTILISATEUR       int not null,
   ID_PRODUIT           int not null,
   primary key (ID_UTILISATEUR, ID_PRODUIT)
);

/*==============================================================*/
/* Table : ACTIVITE                                             */
/*==============================================================*/
create table ACTIVITE
(
   ID_ACTIVITE          int not null auto_increment,
   NOM_ACTIVITE         longtext,
   DATE_ACTIVITE        date,
   DESCRIPTION_ACTIVITE longtext,
   TEMPS_ACTIVITE       time,
   PRIX_ACTIVITE        numeric(8,2),
   primary key (ID_ACTIVITE)
);

/*==============================================================*/
/* Table : COMMENTAIRE                                          */
/*==============================================================*/
create table COMMENTAIRE
(
   ID_COMMENTAIRE       int not null auto_increment,
   ID_PHOTO             int not null,
   ID_UTILISATEUR       int not null,
   TEXTE                longtext,
   primary key (ID_COMMENTAIRE)
);

/*==============================================================*/
/* Table : PARTICIPER                                           */
/*==============================================================*/
create table PARTICIPER
(
   ID_UTILISATEUR       int not null,
   ID_ACTIVITE          int not null,
   primary key (ID_UTILISATEUR, ID_ACTIVITE)
);

/*==============================================================*/
/* Table : PHOTO                                                */
/*==============================================================*/
create table PHOTO
(
   ID_PHOTO             int not null auto_increment,
   NOM_PHOTO            longtext,
   DESCRIPTION_PHOTO    longtext,
   LIKES                numeric(8,0),
   PATH                 longtext,
   primary key (ID_PHOTO)
);

/*==============================================================*/
/* Table : PRODUIT                                              */
/*==============================================================*/
create table PRODUIT
(
   ID_PRODUIT           int not null auto_increment,
   NOM_PRODUIT          longtext,
   DESCRIPTION_PRODUIT  longtext,
   QUANTIT__PRODUIT     int,
   CATEGORIE_PRODUIT    longtext,
   NOMBRE_COMMANDE      int,
   primary key (ID_PRODUIT)
);

/*==============================================================*/
/* Table : UTILISATEUR                                          */
/*==============================================================*/
create table UTILISATEUR
(
   ID_UTILISATEUR       int not null auto_increment,
   NOM_UTILISATEUR      longtext,
   PRENOM_UTILISATEUR   longtext,
   COURIEL              longtext,
   ROLE                 longtext,
   CENTRE_CESI          longtext,
   PANIER               longtext,
   MDP                  longtext,
   primary key (ID_UTILISATEUR)
);

alter table ACHETER add constraint FK_ACHETER foreign key (ID_PRODUIT)
      references PRODUIT (ID_PRODUIT) on delete restrict on update restrict;

alter table ACHETER add constraint FK_ACHETER2 foreign key (ID_UTILISATEUR)
      references UTILISATEUR (ID_UTILISATEUR) on delete restrict on update restrict;

alter table COMMENTAIRE add constraint FK_ECRIT foreign key (ID_UTILISATEUR)
      references UTILISATEUR (ID_UTILISATEUR) on delete restrict on update restrict;

alter table COMMENTAIRE add constraint FK_ILLUSTRE foreign key (ID_PHOTO)
      references PHOTO (ID_PHOTO) on delete restrict on update restrict;

alter table PARTICIPER add constraint FK_PARTICIPER foreign key (ID_ACTIVITE)
      references ACTIVITE (ID_ACTIVITE) on delete restrict on update restrict;

alter table PARTICIPER add constraint FK_PARTICIPER2 foreign key (ID_UTILISATEUR)
      references UTILISATEUR (ID_UTILISATEUR) on delete restrict on update restrict;

