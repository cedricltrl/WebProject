/*==============================================================*/
/* Nom de SGBD :  MySQL 5.0                                     */
/* Date de création :  07/11/2019 16:59:25                      */
/*==============================================================*/


drop table if exists ACTIVITY;

drop table if exists COMMENTARY;

drop table if exists GOOSIES;

drop table if exists PARTICIPATE;

drop table if exists PICTURE;

drop table if exists PURCHASE;

drop table if exists USER;

/*==============================================================*/
/* Table : ACTIVITY                                             */
/*==============================================================*/
create table ACTIVITY
(
   ACTIVITY_ID          int not null auto_increment,
   ACTIVITY_NAME        text,
   ACTIVITY_DATED       date,
   ACTIVITY_DESCRIPTION text,
   ACTIVITY_TIME        time,
   ACTIVITY_COST        float(8,2),
   RECURRING            bool,
   primary key (ACTIVITY_ID)
);

/*==============================================================*/
/* Table : COMMENTARY                                           */
/*==============================================================*/
create table COMMENTARY
(
   COMMENTARY_ID        int not null auto_increment,
   USER_ID              int not null,
   PICTURE_ID           int not null,
   COMMENT              text,
   primary key (COMMENTARY_ID)
);

/*==============================================================*/
/* Table : GOOSIES                                              */
/*==============================================================*/
create table GOOSIES
(
   GOODIES_ID           int not null auto_increment,
   GOODIES_NAME         text,
   GOODIES_DESCRIPTION  text,
   QUANTIT__PRODUIT     int,
   GOODIES_CATEGORY     text,
   ORDER_NUMBER         int,
   GOODIES_PHOTO        text,
   primary key (GOODIES_ID)
);

/*==============================================================*/
/* Table : PARTICIPATE                                          */
/*==============================================================*/
create table PARTICIPATE
(
   USER_ID              int not null,
   ACTIVITY_ID          int not null,
   primary key (USER_ID, ACTIVITY_ID)
);

/*==============================================================*/
/* Table : PICTURE                                              */
/*==============================================================*/
create table PICTURE
(
   PICTURE_ID           int not null auto_increment,
   USER_ID              int not null,
   PICTURE_NAME         text,
   PICTURE_DESCRIPTION  text,
   LIKES                numeric(8,0),
   PATH                 text,
   primary key (PICTURE_ID)
);

/*==============================================================*/
/* Table : PURCHASE                                             */
/*==============================================================*/
create table PURCHASE
(
   USER_ID              int not null,
   GOODIES_ID           int not null,
   primary key (USER_ID, GOODIES_ID)
);

/*==============================================================*/
/* Table : USER                                                 */
/*==============================================================*/
create table USER
(
   USER_ID              int not null auto_increment,
   FIRST_NAME           text,
   LAST_NAME            text,
   EMAIL                text,
   DOCKET               text,
   CAMPUS               text,
   BASCKET              text,
   PASSWORD             text,
   primary key (USER_ID)
);

alter table COMMENTARY add constraint FK_ILLUSTRATE foreign key (PICTURE_ID)
      references PICTURE (PICTURE_ID) on delete restrict on update restrict;

alter table COMMENTARY add constraint FK_WRITE foreign key (USER_ID)
      references USER (USER_ID) on delete restrict on update restrict;

alter table PARTICIPATE add constraint FK_PARTICIPATE foreign key (ACTIVITY_ID)
      references ACTIVITY (ACTIVITY_ID) on delete restrict on update restrict;

alter table PARTICIPATE add constraint FK_PARTICIPATE2 foreign key (USER_ID)
      references USER (USER_ID) on delete restrict on update restrict;

alter table PICTURE add constraint FK_SHARE foreign key (USER_ID)
      references USER (USER_ID) on delete restrict on update restrict;

alter table PURCHASE add constraint FK_PURCHASE foreign key (GOODIES_ID)
      references GOOSIES (GOODIES_ID) on delete restrict on update restrict;

alter table PURCHASE add constraint FK_PURCHASE2 foreign key (USER_ID)
      references USER (USER_ID) on delete restrict on update restrict;

