/*
---
description: Nullsoft Scriptable Install System (NSIS)

license: MIT-style

authors:
  - Jan T. Sott
  - Andi Dittrich

requires:
  - Core/1.4.5

provides: [EnlighterJS.Language.nsis]
...
*/
EJS.Language.nsis = new Class({

	Extends : EJS.Language.generic,

	setupLanguage : function(){
		/** Set of keywords in CSV form. Add multiple keyword hashes for differentiate keyword sets. */

		this.keywords = {
			commands : {
				csv : "Function, PageEx, Section, SectionGroup, SubSection, Abort, AddBrandingImage, AddSize, AllowRootDirInstall, AllowSkipFiles, AutoCloseWindow, BGFont, BGGradient, BrandingText, BringToFront, Call, CallInstDLL, Caption, ChangeUI, CheckBitmap, ClearErrors, CompletedText, ComponentText, CopyFiles, CRCCheck, CreateDirectory, CreateFont, CreateShortCut, Delete, DeleteINISec, DeleteINIStr, DeleteRegKey, DeleteRegValue, DetailPrint, DetailsButtonText, DirText, DirVar, DirVerify, EnableWindow, EnumRegKey, EnumRegValue, Exch, Exec, ExecShell, ExecWait, ExpandEnvStrings, File, FileBufSize, FileClose, FileErrorText, FileOpen, FileRead, FileReadByte, FileReadUTF16LE, FileReadWord, FileSeek, FileWrite, FileWriteByte, FileWriteUTF16LE, FileWriteWord, FindClose, FindFirst, FindNext, FindWindow, FlushINI, FunctionEnd, GetCurInstType, GetCurrentAddress, GetDlgItem, GetDLLVersion, GetDLLVersionLocal, GetErrorLevel, GetFileTime, GetFileTimeLocal, GetFullPathName, GetFunctionAddress, GetInstDirError, GetLabelAddress, GetTempFileName, Goto, HideWindow, Icon, IfAbort, IfErrors, IfFileExists, IfRebootFlag, IfSilent, InitPluginsDir, InstallButtonText, InstallColors, InstallDir, InstallDirRegKey, InstProgressFlags, InstType, InstTypeGetText, InstTypeSetText, IntCmp, IntCmpU, IntFmt, IntOp, IsWindow, LangString, LicenseBkColor, LicenseData, LicenseForceSelection, LicenseLangString, LicenseText, LoadLanguageFile, LockWindow, LogSet, LogText, ManifestDPIAware, ManifestSupportedOS, MessageBox, MiscButtonText, Name, Nop, OutFile, Page, PageCallbacks, PageExEnd, Pop, Push, Quit, ReadEnvStr, ReadINIStr, ReadRegDWORD, ReadRegStr, Reboot, RegDLL, Rename, RequestExecutionLevel, ReserveFile, Return, RMDir, SearchPath, SectionEnd, SectionGetFlags, SectionGetInstTypes, SectionGetSize, SectionGetText, SectionGroupEnd, SectionIn, SectionSetFlags, SectionSetInstTypes, SectionSetSize, SectionSetText, SendMessage, SetAutoClose, SetBrandingImage, SetCompress, SetCompressor, SetCompressorDictSize, SetCtlColors, SetCurInstType, SetDatablockOptimize, SetDateSave, SetDetailsPrint, SetDetailsView, SetErrorLevel, SetErrors, SetFileAttributes, SetFont, SetOutPath, SetOverwrite, SetPluginUnload, SetRebootFlag, SetRegView, SetShellVarContext, SetSilent, ShowInstDetails, ShowUninstDetails, ShowWindow, SilentInstall, SilentUnInstall, Sleep, SpaceTexts, StrCmp, StrCmpS, StrCpy, StrLen, SubCaption, SubSectionEnd, Unicode, UninstallButtonText, UninstallCaption, UninstallIcon, UninstallSubCaption, UninstallText, UninstPage, UnRegDLL, Var, VIAddVersionKey, VIFileVersion, VIProductVersion, WindowIcon, WriteINIStr, WriteRegBin, WriteRegDWORD, WriteRegExpandStr, WriteRegStr, WriteUninstaller, XPStyle",
				alias : 'kw1'
			},
			states : {
				csv : "admin, all, auto, both, colored, false, force, hide, highest, lastused, leave, listonly, none, normal, notset, off, on, open, print, show, silent, silentlog, smooth, textonly, true, user",
				alias : 'kw2'
			},
			statics : {
				csv : "ARCHIVE, FILE_ATTRIBUTE_ARCHIVE, FILE_ATTRIBUTE_NORMAL, FILE_ATTRIBUTE_OFFLINE, FILE_ATTRIBUTE_READONLY, FILE_ATTRIBUTE_SYSTEM, FILE_ATTRIBUTE_TEMPORARY, HKCR, HKCU, HKDD, HKEY_CLASSES_ROOT, HKEY_CURRENT_CONFIG, HKEY_CURRENT_USER, HKEY_DYN_DATA, HKEY_LOCAL_MACHINE, HKEY_PERFORMANCE_DATA, HKEY_USERS, HKLM, HKPD, HKU, IDABORT, IDCANCEL, IDIGNORE, IDNO, IDOK, IDRETRY, IDYES, MB_ABORTRETRYIGNORE, MB_DEFBUTTON1, MB_DEFBUTTON2, MB_DEFBUTTON3, MB_DEFBUTTON4, MB_ICONEXCLAMATION, MB_ICONINFORMATION, MB_ICONQUESTION, MB_ICONSTOP, MB_OK, MB_OKCANCEL, MB_RETRYCANCEL, MB_RIGHT, MB_RTLREADING, MB_SETFOREGROUND, MB_TOPMOST, MB_USERICON, MB_YESNO, NORMAL, OFFLINE, READONLY, SHCTX, SHELL_CONTEXT, SYSTEM, TEMPORARY",
				alias : 'kw3'
			}
		};

		/** Set of RegEx patterns to match */
		this.patterns = {
			'brackets' : {
				pattern : this.common.brackets,
				alias : 'br0'
			},
			'commentMultiline' : {
				pattern : this.common.multiComments,
				alias : 'co2'
			},
			'commentPound' : {
				pattern : this.common.poundComments,
				alias : 'co1'
			},
			'commentSemicolon' : {
				pattern : /;.*$/gm,
				alias : 'co1'
			},
			'compilerFlags' : {
				pattern : /(!(addincludedir|addplugindir|appendfile|cd|define|delfile|echo|else|endif|error|execute|finalize|getdllversionsystem|ifdef|ifmacrodef|ifmacrondef|ifndef|if|include|insertmacro|macroend|macro|makensis|packhdr|searchparse|searchreplace|tempfile|undef|verbose|warning))/g,
				alias : 'kw2'
			},
			'defines' : {
				pattern : /[\$]\{{1,2}[0-9a-zA-Z_][\w]*[\}]/gim,
				alias : 'kw4'
			},
			'jumps' : {
				pattern : /([(\+|\-)]([0-9]+))/g,
				alias : 'nu0'
			},
			'langStrings' : {
				pattern : /[\$]\({1,2}[0-9a-zA-Z_][\w]*[\)]/gim,
				alias : 'kw3'
			},
			'escapeChars' : {
				pattern : /([\$]\\(n|r|t|[\$]))/g,
				alias : 'kw4'
			},
			'numbers' : {
				pattern : /\b((([0-9]+)?\.)?[0-9_]+([e][\-+]?[0-9]+)?|0x[A-F0-9]+)\b/gi,
				alias : 'nu0'
			},
			'pluginCommands' : {
				pattern : /(([0-9a-zA-Z_]+)[:{2}]([0-9a-zA-Z_]+))/g,
				alias : 'kw2'
			},
			'strings' : {
				pattern : this.common.strings,
				alias : 'st0'
			},
			'variables' : {
				pattern : /[\$]{1,2}[0-9a-zA-Z_][\w]*/gim,
				alias : 'kw4'
			}
		};

	}
});
