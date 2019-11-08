/*==============================================================*/
/* Nom de SGBD :  MySQL 5.0                                     */
/* Date de cr�ation :  08/11/2019 09:29:33                      */
/*==============================================================*/


drop table if exists ACTIVITY;

drop table if exists COMMENTARY;

drop table if exists GOODIES;

drop table if exists PARTICIPATE;

drop table if exists PICTURE;

drop table if exists PURCHASE;

drop table if exists USER;

/*==============================================================*/
/* Table : ACTIVITY                                             */
/*==============================================================*/
create table activity
(
   activity_id          int not null auto_increment,
   activity_name        text,
   activity_dated       date,
   activity_description text,
   activity_time        time,
   activity_cost        float(8,2),
   recurring            bool,
   primary key (activity_id)
);
/*==============================================================*/
/* Table : COMMENTARY                                           */
/*==============================================================*/
create table commentary
(
   commentary_id        int not null auto_increment,
   id              int not null,
   picture_id          int not null,
   comment              text,
   primary key (commentary_id)
);

/*==============================================================*/
/* Table : GOODIES                                              */
/*==============================================================*/
create table goodies
(
   goodies_id           int not null auto_increment,
   goodies_name         text,
   goodies_description  text,
   goodies_in_stock     int,
   goodies_category     text,
   order_number         int,
   goodies_photo        text,
   goodies_cost         float(8,2),
   primary key (goodies_id)
);


/*==============================================================*/
/* Table : PARTICIPATE                                          */
/*==============================================================*/
create table participate
(
   id              int not null,
   activity_id          int not null,
   primary key (id, activity_id)
);

/*==============================================================*/
/* Table : PICTURE                                              */
/*==============================================================*/
create table picture
(
   picture_id           int not null auto_increment,
   id              int not null,
   picture_name         text,
   picture_description  text,
   likes                numeric(8,0),
   path                 text,
   primary key (picture_id)
);

/*==============================================================*/
/* Table : PURCHASE                                             */
/*==============================================================*/
create table purchase
(
   id              int not null,
   goodies_id           int not null,
   primary key (id, goodies_id)
);

/*==============================================================*/
/* Table : USER                                                 */
/*==============================================================*/
create table user
(
   id              int not null auto_increment,
   first_name           text,
   last_name            text,
   email                text,
   docket               text,
   campus               text,
   bascket              text,
   password             text,
   primary key (id)
);

alter table commentary add constraint FK_ILLUSTRATE foreign key (picture_id)
      references picture (picture_id) on delete restrict on update restrict;

alter table commentary add constraint FK_WRITE foreign key (id)
      references user (id) on delete restrict on update restrict;

alter table participate add constraint FK_PARTICIPATE foreign key (activity_id)
      references activity (activity_id) on delete restrict on update restrict;

alter table participate add constraint FK_PARTICIPATE2 foreign key (id)
      references user (id) on delete restrict on update restrict;

alter table picture add constraint FK_SHARE foreign key (id)
      references user (id) on delete restrict on update restrict;

alter table purchase add constraint FK_PURCHASE foreign key (goodies_id)
      references goodies (goodies_id) on delete restrict on update restrict;

alter table purchase add constraint FK_PURCHASE2 foreign key (id)
      references user (id) on delete restrict on update restrict;
