<?php include('dbconnect.php');
$CustomerCreation="CREATE TABLE studenttb
(
    StudentID int  NOT NULL Auto_Increment Primary Key,
    StudentName varchar(50),
    Username varchar(50),
    Address varchar(50),
    PhoneNo varchar(50),
    Email varchar(50),
    Password varchar(50),
    StudentPicture varchar(100)
 )";
 $runningquery=mysqli_query($connection, $CustomerCreation);
 if ($runningquery) 
// check the result
{
    echo "<script>window.alert('Student table successfully added')</script>";
} 


// $AdminCreation="CREATE TABLE stafftb
// (
//     StaffID int  NOT NULL Auto_Increment Primary Key,
//     StaffName varchar(50),
//     Username varchar(50),
//     Address varchar(50),
//     PhoneNo varchar(50),
//     Email varchar(50),
//     Password varchar(50),
//     StaffPicture varchar(100),
//     RoleID int,
//     Foreign Key(RoleID) references StaffRoletb(RoleID)
//  )";
//  $runningquery=mysqli_query($connection, $AdminCreation);
//  if ($runningquery) 
// // check the result
// {
//     echo "<script>window.alert('Testing table successfully deleted')</script>";
// }

// // create table
// $rolecreation="CREATE TABLE StaffRoletb
// (
//     RoleID int  NOT NULL Auto_Increment Primary Key,
//     Rolename varchar(50)
// )";
//  $runningquery=mysqli_query($connection, $rolecreation);
//  if ($runningquery) 
// // check the result
// {
//     echo "<script>window.alert('StaffRole table successfully added')</script>";
// } 


// ----------------
// $ContactCreation="CREATE TABLE contacttb
// (
//     CodeNo int  NOT NULL Auto_Increment Primary Key,
//     Subject varchar(255),
//     Date varchar(30),
//     Description varchar(255),
//     Email varchar(50),
//     Phonenumber varchar(50)
//  )";
//  $runningquery=mysqli_query($connection, $ContactCreation);
//  if ($runningquery) 
// check the result
// {
//     echo "<script>window.alert('customer table successfully added')</script>";
// } 


// $ParticipateCreation="CREATE TABLE participatetb
// (
//     ParticipateID int  NOT NULL Auto_Increment Primary Key,
//     Date varchar(30),
//     Description varchar(255),
//     CampaignQuantity int,
//     Tax int,
//     TotalFees int,
//     Email varchar(50),
//     Phonenumber varchar(50),
//     Status varchar(30),
//     CustomerID int,
//     CampaignID int,
//     Foreign Key(CustomerID) references customertb(CustomerID),
//     Foreign Key(CampaignID) references campaigntb(CampaignID)
//  )";
//  $runningquery=mysqli_query($connection, $ParticipateCreation);
//  if ($runningquery) 
// // check the result
// {
//     echo "<script>window.alert('participate table successfully added')</script>";
// } 

// $CustomerCreation="CREATE TABLE customertb
// (
//     CustomerID int  NOT NULL Auto_Increment Primary Key,
//     FirstName varchar(50),
//     SurName varchar(50),
//     Username varchar(50),
//     Address varchar(50),
//     PhoneNo varchar(50),
//     Email varchar(50),
//     Password varchar(50),
//     RegistrationMonth varchar(30),
//     AdminPicture varchar(100)
//  )";
//  $runningquery=mysqli_query($connection, $CustomerCreation);
//  if ($runningquery) 
// // check the result
// {
//     echo "<script>window.alert('customer table successfully added')</script>";
// } 


// $CampaignCreation="CREATE TABLE campaigntb
// (
//     CampaignID int  NOT NULL Auto_Increment Primary Key,
//     Aim varchar(255),
//     Vision varchar(255),
//     Fees int,
//     Location text,
//     StartDate varchar(100),
//     EndDate varchar(100),
//     Description varchar(255),
//     campaignimg1 varchar(255),
//     campaignimg2 varchar(255),
//     campaignimg3 varchar(255),
//     CampaignStatus varchar(30),
//     MediaID int,
//     CampaignTypeID int,
//     Foreign Key(MediaID) references mediatb(MediaID),
//     Foreign Key(CampaignTypeID) references campaigntypetb(CampaignTypeID)
//  )";
//  $runningquery=mysqli_query($connection, $CampaignCreation);
//  if ($runningquery) 
// // check the result
// {
//     echo "<script>window.alert('campaign table successfully added')</script>";
// }



// $StaffRoleCreation="CREATE TABLE roletb
// (
//     RoleID int  NOT NULL Auto_Increment Primary Key,
//     Position varchar(50)
//  )";
//  $runningquery=mysqli_query($connection, $StaffRoleCreation);
//  if ($runningquery) 
// // check the result
// {
//     echo "<script>window.alert('campaign type table successfully added')</script>";
// } 


// $CampaignTypeCreation="CREATE TABLE campaigntypetb
// (
//     CampaignTypeID int  NOT NULL Auto_Increment Primary Key,
//     CampaignTypeName varchar(30)
//  )";
//  $runningquery=mysqli_query($connection, $CampaignTypeCreation);
//  if ($runningquery) 
// // check the result
// {
//     echo "<script>window.alert('campaign type table successfully added')</script>";
// }

// $MediaCreation="CREATE TABLE mediatb
// (
//     MediaID int  NOT NULL Auto_Increment Primary Key,
//     MediaName varchar(30),
//     Description varchar(100),
//     Mediaimg varchar(255),
//     Medialink varchar(30),
//     Rating int, 
//     Technique1 vachar(255),
//     Technique2 vachar(255),
//     Technique3 vachar(255)

//  )";
//  $runningquery=mysqli_query($connection, $MediaCreation);
//  if ($runningquery) 
// // check the result
// {
//     echo "<script>window.alert('media table successfully added')</script>";
// } 
 //create table
// $packagetypecreation="CREATE TABLE packagetypetb
// (
//     PackageTypeID int  NOT NULL Auto_Increment Primary Key,
//     PackageTypeName varchar(30),
//     PackageTypeDescription text,
//     PackageTypeStatus varchar(30)
// )";
// $runningquery=mysqli_query($connection, $packagetypecreation);
// if ($runningquery) 
// //check the result
// {
//     echo "<script>window.alert('route query success')</script>";
// } 
//create table
// $rolecreation="CREATE TABLE Roletb
// (
//     RoleID int  NOT NULL Auto_Increment Primary Key,
//     Rolename varchar(50)
// )";
// $deletestafftb="DROP TABLE IF EXISTS stafftb";
// $packagecreation="CREATE TABLE packagetb
// (
//     PackageID int  NOT NULL Auto_Increment Primary Key,    
//     PackageName varchar(30),    
//     Duration varchar(30),
//     PackagePrice int,
//     PackageDescription text, 
//     Packageimg1 varchar(255),
//     Packageimg2 varchar(255),
//     Packageimg3 varchar(255),
//     Packageimg4  varchar(255),
//     PackageStatus varchar(30),
//     AvailablePeople varchar(30),
//     PackageTypeID int,
//     routeno int,
//     HotelCodeNo int,
//     Foreign Key(PackageTypeID) references packagetypetb(PackageTypeID),
//     Foreign Key(routeno) references routetb(routeno),
//     Foreign Key(HotelCodeNo) references hoteltb (HotelCodeNo)

// )";
// $runningquery=mysqli_query($connection, $packagecreation);
// if ($runningquery) 
// // check the result
// {
//     echo "<script>window.alert('package query success')</script>";
// } 
// //create table
// $routecreation="CREATE TABLE routetb
// (
//     routeno int  NOT NULL Auto_Increment Primary Key,
//     routename varchar(30),
//     routedescription text
// )";
// $runningquery=mysqli_query($connection, $routecreation);
// if ($runningquery) 
// //check the result
// {
//     echo "<script>window.alert('route query success')</script>";
// } 

// //create table
// $hotelcreation="CREATE TABLE hoteltb
// (
//     HotelCodeNo int  NOT NULL Auto_Increment Primary Key,
//     Hotelname varchar(30),
//     HotelLocation text,
//     Hoteldescription text
// )";
// $runningquery=mysqli_query($connection, $hotelcreation);
// if ($runningquery) 
// //check the result
// {
//     echo "<script>window.alert('hotel query success')</script>";
// } 

?>