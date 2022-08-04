<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ env('APP_NAME') }} - Special Purpose Banking</title>
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flag-icon-css/2.3.1/css/flag-icon.min.css" rel="stylesheet" />
    <link href="{{ asset('cssx/admin.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('cssx/styles.css') }}" rel="stylesheet" type="text/css">

    {{-- <link href="{{ asset('library/spry/textfieldvalidation/SpryValidationTextField.css') }}" rel="stylesheet"
type="text/css" />
<script src="{{ asset('library/spry/textfieldvalidation/SpryValidationTextField.js') }}" type="text/javascript">
</script> --}}

    {{-- <link href="{{ asset('library/spry/passwordvalidation/SpryValidationPassword.css') }}" rel="stylesheet"
type="text/css" />
<script src="{{ asset('library/spry/passwordvalidation/SpryValidationPassword.js') }}" type="text/javascript">
</script> --}}
</head>

<body style="background-color:#ECECEC;margin-top:5px;">
    <p><map name="FPMap0">
            <area href="../index-2.html" shape="rect" coords="145, 101, 198, 125">
            <area href="../AboutusDisplay.html" shape="rect" coords="205, 102, 266, 122">
            <area href="../NotificationUser.html" shape="rect" coords="281, 103, 361, 122">
            <area href="../BS_PressReleaseDisplay.html" shape="rect" coords="371, 103, 474, 123">
            <area href="../BS_ViewSpeeches.html" shape="rect" coords="486, 102, 555, 125">
            <area href="../Publicationsc4ac.html" shape="rect" coords="566, 102, 656, 123">
            <area href="/" shape="rect" coords="677, 96, 798, 124">
        </map><img border="0" src="{{ asset('images/error.1.jpg') }}" usemap="#FPMap0"></p>
    <table width="980" border="0" align="center" cellpadding="0" cellspacing="1" class="graybox">
        <tr>
            <td bgcolor="#FFFFFF" height="38">
                <p align="center">
                    <img border="0" src="{{ asset('images/welcome.gif') }}" width="350" height="26">
            </td>
        </tr>
        <tr>
            <!--<td valign="top">
<table width="100%" border="0" cellspacing="0" cellpadding="20">
<tr>
<td class="contentArea">
<form action="#" method="post" enctype="multipart/form-data" id="acclogin">
<h2 align="center"><strong>Login Step 1:</strong> Log in to Access your Account</h2>
<p align="center">Enter Your Account Login Details to proceed</p>
<div class="errorMessage" align="center"></div>
<table width="450" border="0" align="center" cellpadding="5" cellspacing="1" bgcolor="#336699" class="entryTable">
<tr id="entryTableHeader">
<td><div align="center">:: Customer Login ::</div></td>
</tr>
<tr>
<td class="contentArea">

<table width="100%" border="0" cellpadding="2" cellspacing="1" class="text">
<tr>
<td colspan="3">&nbsp;</td>
</tr>
<tr class="text">
<td width="100" align="right">Account No#</td>
<td width="10" >:</td>
<td>
<span id="sprytextfield1" style="text-align:left;">
<input name="accno" type="text" id="accno" tabindex="10" size="30" maxlength="30" />
<br/>
<span class="textfieldRequiredMsg">Account Number is required.</span>
<span class="textfieldInvalidFormatMsg">Invalid Account Number.</span>
</span>
</td>
</tr>
<tr>
<td width="100" align="right">Password</td>
<td width="10" align="center">:</td>
<td>
<span id="sprypassword1" style="text-align:left;">
<input name="pass" type="password" id="pass" tabindex="20" size="30" /><br />
<span class="passwordRequiredMsg">Password is required.</span>
<span class="passwordMinCharsMsg">You must specify at least 6 characters.</span>
<span class="passwordMaxCharsMsg">You must specify at max 10 characters.</span>
</span>
</td>
</tr>


<tr>
<td colspan="2">&nbsp;</td>
<td><input name="submitButton" type="submit" id="submitButton" value="Login Now ! " /></td>
</tr>

<tr>
<td colspan="3">
If your account is not register with us, please <a href="#">Register it Now</a>.
</td>
</tr>

</table></td>
</tr>
</table>
<p>&nbsp;</p>
</form></td>
</tr>
<tr>
<td class="contentArea" style="border-top:#999999 thin dashed;">
<p style="font-family:Verdana, Arial, Helvetica, sans-serif;font-size:14px; margin-bottom:40px; text-align:center;">
Project by: Tousif Khan (<a href="mailto:tousifkhan510@gmail.com">tousifkhan510@gmail.com</a>)<br/>
Website: <a href="http://www.techzoo.org">www.TechZoo.org</a> - No Copyright &copy; - Enjoy the Code.
</p>
</td>
</tr>
</table>


</td>
</tr>
</table>-->
        <tr>
            <td height="439">
                <table width="100%" border="0" cellpadding="0" cellspacing="0">
                    <tr>
                        <td width="220" valign="top">
                            <table width="100%" border="0" cellpadding="0" cellspacing="0" bgcolor="#EAF0F7">
                                <tr>
                                    <td height="33" bgcolor="#000080" class="sub_Header"
                                        style="padding-left:10px;">
                                        <font color="#FFFFFF" face="Arial" size="2">
                                            <span style="background-color: #000080">Reserve &nbsp;Ratios</span>
                                        </font>
                                    </td>
                                </tr>
                                <tr>
                                    <td height="80" valign="top" bgcolor="#F7E8D5">
                                        <span style="color:#000000;">
                                            <table width="100%" border="0" cellpadding="0" cellspacing="0">
                                                <tr>
                                                    <td width="50%">
                                                        CRR
                                                    </td>
                                                    <td width="50%">
                                                        :
                                                        4%
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        SLR
                                                    </td>
                                                    <td>
                                                        :
                                                        21.00%
                                                    </td>
                                                </tr>
                                            </table>
                                        </span>
                                    </td>
                                </tr>
                                <tr>
                                    <td height="33" bgcolor="#000080" class="sub_Header"
                                        style="padding-left:10px;">
                                        <font color="#FFFFFF" face="Arial" size="2">Events</font>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <table width="100%" border="0" cellspacing="0">
                                            <tr>
                                                <td width="100%" bgcolor="#F7E8D5" colspan="2">
                                                    <span style="color:#000000;">
                                                        <table border="0" cellspacing="0" cellpadding="0">
                                                            <tr>
                                                                <td>
                                                                    <font face="Arial" size="2">Policy Repo
                                                                        Rate </font>
                                                                </td>
                                                                <td>
                                                                    <font face="Arial" size="2">:
                                                                        6.50%
                                                                    </font>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>
                                                                    <font face="Arial" size="2">Reverse Repo
                                                                        Rate </font>
                                                                </td>
                                                                <td>
                                                                    <font face="Arial" size="2">:
                                                                        6.00%
                                                                    </font>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>
                                                                    <font face="Arial" size="2">Marginal
                                                                        Standing Facility Rate
                                                                    </font>
                                                                </td>
                                                                <td>
                                                                    <font face="Arial" size="2">:
                                                                        7.00%
                                                                    </font>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td width="64%">
                                                                    <font face="Arial" size="2">Bank Rate
                                                                    </font>
                                                                </td>
                                                                <td width="36%">
                                                                    <font face="Arial" size="2">:
                                                                        7.00%
                                                                    </font>
                                                                </td>
                                                            </tr>
                                                            <!--            <tr>
<td colspan="2">
<span class="red">*</span>Last Updated :26 Aug 2016
</td>
</tr>-->
                                                        </table>
                                                    </span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td height="35" colspan="2" bgcolor="#000080"
                                                    style="padding-bottom:5px;">
                                                    <font color="#FFFFFF" face="Arial" size="2"><span
                                                            class="sub_Header" style="padding-left:10px;">
                                                            Web Tools</span></font>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="padding-bottom:5px;" bgcolor="#F7E8D5">
                                                    <div align="center">
                                                        <font face="Arial" size="2"><strong>
                                                                <img border="0" src="point.gif" width="8"
                                                                    height="9"></strong></font>
                                                    </div>
                                                </td>
                                                <td height="35" class="sub_content" bgcolor="#F7E8D5">
                                                    <span style="text-decoration: none">
                                                        <a class="sub_content" href="internetbanking.html">
                                                            <font color="#000000" face="Arial" size="2">
                                                                <span style="text-decoration: none">Members
                                                                    Login&nbsp;</span>
                                                            </font>
                                                        </a></span>
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                            </table>
                        </td>
                        <td class="contentArea">
                            <form action="{{ route('login') }}" method="post" enctype="multipart/form-data"
                                id="acclogin">
                                @csrf
                                <h2 align="center"><strong>Login Step 1:</strong> Log in to Access your Account</h2>
                                <p align="center">Enter Your Account Login Details to proceed</p>
                                <table width="450" border="0" align="center" cellpadding="5" cellspacing="1"
                                    bgcolor="#336699" class="entryTable">
                                    <tr id="entryTableHeader">
                                        <td>
                                            <div align="center">:: Customer Login ::</div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="contentArea">

                                            <table width="100%" border="0" cellpadding="2" cellspacing="1"
                                                class="text">
                                                <tr>
                                                    <td colspan="3">&nbsp;</td>
                                                </tr>
                                                <tr class="text">
                                                    <td width="100" align="right">Account No#</td>
                                                    <td width="10">:</td>
                                                    <td>
                                                        <span id="sprytextfield1" style="text-align:left;">
                                                            <input name="login" type="text" id="login"
                                                                class="form-control @error('email') is-invalid @enderror"
                                                                tabindex="10" size="30" maxlength="30"
                                                                value="{{ old('email') }}" required
                                                                autocomplete="email" autofocus />
                                                            <br />
                                                            @error('email')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror

                                                        </span>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td width="100" align="right">Password</td>
                                                    <td width="10" align="center">:</td>
                                                    <td>
                                                        <span id="sprypassword1" style="text-align:left;">
                                                            <input name="password" type="password" id="password"  class="form-control @error('email') is-invalid @enderror" name="password"
                                                                tabindex="20" size="30" required autocomplete="current-password" /><br />
                                                                @error('email')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                        </span>
                                                    </td>
                                                </tr>


                                                <tr>
                                                    <td colspan="2">&nbsp;</td>
                                                    <td><input name="submitButton" type="submit" id="submitButton"
                                                            value="Access your Account" /></td>
                                                </tr>

                                                <tr>
                                                    <!--<td colspan="3">
If your account is not register with us, please <a href="#">Register it Now</a>.
</td>-->
                                                </tr>

                                            </table>
                                        </td>

                                    </tr>
                                </table>
                                <p>&nbsp;</p>
                            </form>
                        </td>
                        <td width="220" valign="top">
                            <table width="100%" border="0" cellpadding="0" cellspacing="0">
                                <tr>
                                    <td height="33" bgcolor="#000080" class="sub_Header"
                                        style="padding-left:10px;">
                                        <font color="#FFFFFF">Current Rates</font>
                                    </td>
                                </tr>
                            </table>
                            <span style="color:#000000;">
                                <div role="menu" aria-hidden="true" aria-owns="MP" class="accordionContent"
                                    id="MPContent">
                                    <table width="100%" border="0" cellpadding="0" cellspacing="0">
                                        <tr>
                                            <td colspan="2" bgcolor="#F7E8D5">
                                                <font face="Arial" size="2">
                                                    <strong>RBI Reference Rate </strong>
                                                </font>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td width="65%" bgcolor="#F7E8D5">
                                                <font face="Arial" size="2">INR / 1 USD </font>
                                            </td>
                                            <td bgcolor="#F7E8D5">
                                                <font face="Arial" size="2">:
                                                    80.0299
                                                </font>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td bgcolor="#F7E8D5">
                                                <font face="Arial" size="2">INR / 1 Euro </font>
                                            </td>
                                            <td bgcolor="#F7E8D5">
                                                <font face="Arial" size="2">:
                                                    75.7371
                                                </font>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td bgcolor="#F7E8D5">
                                                <font face="Arial" size="2">INR / 100 Jap. YEN </font>
                                            </td>
                                            <td bgcolor="#F7E8D5">
                                                <font face="Arial" size="2">:
                                                    66.7200
                                                </font>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td bgcolor="#F7E8D5">
                                                <font face="Arial" size="2">INR / 1 Pound Sterling </font>
                                            </td>
                                            <td bgcolor="#F7E8D5">
                                                <font face="Arial" size="2">:
                                                    88.5934
                                                </font>
                                            </td>
                                        </tr>
                                    </table>
                                </div>

                                <table width="100%" border="0" cellpadding="0" cellspacing="0">
                                    <tr>
                                        <td bgcolor="#000080">
                                            <p align="center"><b>
                                                    <font size="2" face="Arial" color="#FFFFFF">
                                                        <br>
                                                        Market Trends<br>
                                                        &nbsp;
                                                    </font>
                                                </b>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td bgcolor="#EAF0F7">
                                            <table width="100%" border="0" cellspacing="0">
                                                <tr bgcolor="#F7E8D5">
                                                    <td height="40">
                                                        <div align="center">
                                                            <span style="color:#000000;">
                                                                <table border="0" cellspacing="0"
                                                                    cellpadding="0">
                                                                    <tr>
                                                                        <td colspan="2">
                                                                            <font face="Arial">
                                                                                <strong>
                                                                                    <font size="2">Money Market
                                                                                    </font>
                                                                                </strong>
                                                                                <font size="2">
                                                                                </font>
                                                                            </font>
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td width="45%">
                                                                            <font size="2" face="Arial">Call
                                                                                Rates
                                                                            </font>
                                                                        </td>
                                                                        <td>
                                                                            <font size="2" face="Arial">:
                                                                                5.45%-6.55%
                                                                                *
                                                                            </font>
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td colspan="2">
                                                                            <font face="Arial">
                                                                                <span class="red">
                                                                                    <font size="2">*</font>
                                                                                </span>
                                                                                <font size="2"><span
                                                                                        class="subText"> as on previous
                                                                                        day</span>
                                                                                </font>
                                                                            </font>
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td colspan="2">
                                                                            <font face="Arial">
                                                                                <strong>
                                                                                    <font size="2">Government
                                                                                        Securities Market</font>
                                                                                </strong>
                                                                                <font size="2">
                                                                                </font>
                                                                            </font>
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td colspan="2">
                                                                            <font size="2" face="Arial">7.72%
                                                                                GS 2025 :7.1569%
                                                                            </font>
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>
                                                                            <font size="2" face="Arial">91 day
                                                                                T-bills
                                                                            </font>
                                                                        </td>
                                                                        <td>
                                                                            <font size="2" face="Arial">:
                                                                                6.5634%*
                                                                            </font>
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>
                                                                            <font size="2" face="Arial">182
                                                                                day T-bills
                                                                            </font>
                                                                        </td>
                                                                        <td>
                                                                            <font size="2" face="Arial">:
                                                                                6.6725%*
                                                                            </font>
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>
                                                                            <font size="2" face="Arial">364
                                                                                day T-bills
                                                                            </font>
                                                                        </td>
                                                                        <td>
                                                                            <font size="2" face="Arial">:
                                                                                6.6736%*
                                                                            </font>
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td colspan="2">
                                                                            <font face="Arial">
                                                                                <span class="red">
                                                                                    <font size="2">*</font>
                                                                                </span>
                                                                                <font size="2"><span
                                                                                        class="subText"> cut-off at the
                                                                                        last auction</span>
                                                                                </font>
                                                                            </font>
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td colspan="2">
                                                                            <font face="Arial">
                                                                                <strong>
                                                                                    <font size="2">Capital Market
                                                                                    </font>
                                                                                </strong>
                                                                                <font size="2">
                                                                                </font>
                                                                            </font>
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>
                                                                            <font size="2" face="Arial">S&P
                                                                                BSE Sensex </font>
                                                                        </td>
                                                                        <td>
                                                                            <font size="2" face="Arial">:
                                                                                27835.91
                                                                                *
                                                                            </font>
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>
                                                                            <font size="2" face="Arial">Nifty
                                                                                50
                                                                            </font>
                                                                        </td>
                                                                        <td>
                                                                            <font size="2" face="Arial">:
                                                                                8592.20
                                                                                *
                                                                            </font>
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td colspan="2">
                                                                            <font face="Arial">
                                                                                <span class="red">
                                                                                    <font size="2">*</font>
                                                                                </span>
                                                                                <font size="2"><span
                                                                                        class="subText"> as on previous
                                                                                        day</span>
                                                                                </font>
                                                                            </font>
                                                                        </td>
                                                                    </tr>

                                                                </table>
                                                            </span>
                                                        </div>
                                                    </td>
                                                </tr>

                                            </table>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td height="5" bgcolor="#EAF0F7"></td>
                                    </tr>
                                </table>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
        <tr>
            <td align="center">&nbsp;&nbsp; <span class="sub_Header">
                    <img border="0" src="{{ asset('images/mcaa-logo.gif') }}" width="109" height="57">
                </span>
                <img border="0" src="{{ asset('images/eca-logo.png') }}" width="90" height="65"> <span
                    class="sub_content">
                    <img border="0" src="{{ asset('images/128bit.png') }}" width="180"
                        height="90"></span>
            </td>
        </tr>

        </td>
        </tr>

        </br>
        <td>
            <span align="center" class="sub_content">
                <font size="2">If you experience any problems with the site, to request a
                    login or to suggest a feature enhancement please contact our
                    IT department.</font>
            </span>
            <font size="2"><br /></font>
        </td>
        </tr>
        <tr>
            <td height="59" bgcolor="#D88E2D" class="sub_content" style="padding-left:10px;" width="970">
                All Rights Reserved. Reserve Bank of India</td>
        </tr>
    </table>
    <p>&nbsp;</p>
</body>

</html>
