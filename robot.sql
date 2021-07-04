-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jul 04, 2021 at 09:56 PM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 8.0.7

CREATE TABLE `base` (
  `ID` int(11) NOT NULL,
  `Moving` char(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE `motors` (
  `id` int(11) NOT NULL,
  `Motor1` int(11) NOT NULL,
  `Motor2` int(11) NOT NULL,
  `Motor3` int(11) NOT NULL,
  `Motor4` int(11) NOT NULL,
  `Motor5` int(11) NOT NULL,
  `Motor6` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE `powering` (
  `id` int(11) NOT NULL,
  `Powered` bit(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


ALTER TABLE `motors`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `powering`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `motors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE `powering`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;


ALTER TABLE `base`
  ADD PRIMARY KEY (`ID`);

ALTER TABLE `base`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;


