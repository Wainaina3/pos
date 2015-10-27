/**
 * Created by davie on 10/10/15.
 */


/*
 Global variables to hold references to the host application object that provides access to
 the Framework APIs and the settings of your mail add-in.
 */
var outlook;
var settings;

/*
 When the Framework is ready, the initialize() method will be called.
 This method is the entry point for your code.
 */

// The initialize function is required for all add-ins.
Office.initialize = function () {
    // Checks for the DOM to load using the jQuery ready function.
    $(document).ready(function () {
        // After the DOM is loaded, app-specific code can run.
        mailbox = Office.context.mailbox;
        settings = Office.context.roamingSettings;

        /* mail add-in code goes here */
        for(var mails=0;mails<mailbox.item.count;mails++)
        {

        }

    });
};

document.getElementById("senderDisplayName").innerText = mailbox.item.sender.displayName;
document.getElementById("senderEmailAddress").innerText = mailbox.item.sender.emailAddress;
document.getElementById("recipientDisplayName").innerText = mailbox.item.to[0].displayName;
document.getElementById("recipientEmailAddress").innerText = mailbox.item.to[0].emailAddress;

function getSubjects(){

    var subjects=Office.context.mailbox.item.subject;
}

function emails(){
    $(document).ready(function(){
       mailbox=office.context.mailbox;

    });
}
function getEmails()
{
    var objOutlook = new ActiveXObject("Outlook.Application");
    var session = objOutlook.Session;

    for(var folderCount = 1;folderCount <= session.Folders.Count; folderCount++)
    {
        var folder = session.Folders.Item(folderCount);
        if(folder.Name.indexOf("Mailbox - ")>=0)
        {
            for(var subFolCount = 1; subFolCount <= folder.Folders.Count; subFolCount++)
            {
                var sampleFolder = folder.Folders.Item(subFolCount);
                if(sampleFolder.Name.indexOf("Sample")>=0)
                {
                    for(var itmCount = 1; itmCount <= sampleFolder.Items.Count; itmCount++)
                    {
                        var itm = sampleFolder.Items.Item(itmCount);
                        if(!itm.UnRead)
                            continue;
                        var sentBy = itm.SenderName;
                        var sentDate = itm.SentOn;
                        var receivedBy = itm.ReceivedByName;
                        var receivedDate = itm.ReceivedTime;
                        var subject = itm.ConversationTopic;
                        var contents = itm.Body;

                        var tbl = document.getElementById('tblContents');
                        if(tbl)
                        {
                            var tr = tbl.insertRow(tbl.rows.length);

                            if(tbl.rows.length%2 != 0)
                                tr.className = "alt";

                            var tdsentBy = tr.insertCell(0);
                            var tdsentDate = tr.insertCell(1);
                            var tdreceivedBy = tr.insertCell(2);
                            var tdreceivedDate = tr.insertCell(3);
                            var tdsubject = tr.insertCell(4);
                            var tdcontents = tr.insertCell(5);

                            tdsentBy.innerHTML = sentBy;
                            tdsentDate.innerHTML = sentDate;
                            tdreceivedBy.innerHTML = receivedBy;
                            tdreceivedDate.innerHTML =    receivedDate;
                            tdsubject.innerHTML = subject;
                            tdcontents.innerHTML = contents;
                        }
                        itm.UnRead = false;
                    }
                    break;
                }
            }
            break;
        }
    }
    return;
}
