using System;
using System.Collections.Generic;
using System.ComponentModel;
using System.Data;
using System.Data.Entity;
using System.Drawing;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using System.Windows.Forms;

namespace GYM
{
    public partial class MembersForm : Form
    {
        static Members member = new Members();
        static GYM_database gymDatabaseContext = new GYM_database();
        int subNumber;
        

        public MembersForm()
        {
            InitializeComponent();
        }

        private void btnAddNewMember_Click(object sender, EventArgs e)
        {
            AddMember();
            PopulateDatabase();
        }

        void AddMember()
        {
            if (comboxSub.Text == "3x per week")
                subNumber = 1;
            if (comboxSub.Text == "4x per week")
                subNumber = 2;
            if (comboxSub.Text == "5x per week")
                subNumber = 3;
            if (comboxSub.Text == "6x per week")
                subNumber = 4;
            if (comboxSub.Text == "Student 3x per week")
                subNumber = 5;
            if (comboxSub.Text == "Student 4x per week")
                subNumber = 6;
            if (comboxSub.Text == "Student 5x per week")
                subNumber = 7;
            if (comboxSub.Text == "Student 6x per week")
                subNumber = 8;

            member = new Members
            {
                memberId = FindID(),
                memberName = txtFirstName.Text,
                memberLastName = txtLastName.Text,
                memberGender = comboxGender.Text,
                memberAge=Int32.Parse(txtAge.Text),
                memberHeight=float.Parse(txtHeight.Text),
                memberWeight=float.Parse(txtWeight.Text),
                subId=subNumber
            };
        }

        void PopulateDatabase()
        {
            gymDatabaseContext = new GYM_database();
            Database.SetInitializer(new DropCreateDatabaseAlways<GYM_database>());
            gymDatabaseContext.Members.Add(member);
            int noRows = gymDatabaseContext.SaveChanges();
            MessageBox.Show("Member added successfully!");
        }

        private void btnSearchLastName_Click(object sender, EventArgs e)
        {
            SearchMember();
        }

        private void btnSearchAllMembers_Click(object sender, EventArgs e)
        {
            SearchAllMembers();
        }

        void SearchMember()
        {
            var members = from m in gymDatabaseContext.Members where m.memberLastName == txtLastName.Text select m;
            foreach (Members m in members)
                rtbResult.AppendText("ID: " + m.memberId + "\n" + "First Name: " + m.memberName + "\n" + "LastName: " + m.memberLastName + "\n" + "Age: " + m.memberAge + "\n\n");
        }

        void SearchAllMembers()
        {
            var members = from m in gymDatabaseContext.Members select m;
            foreach (Members m in members)
                rtbResult.AppendText("ID: " + m.memberId + "\n" + "First Name: " + m.memberName + "\n" + "LastName: " + m.memberLastName + "\n" + "Age: " + m.memberAge + "\n\n");
        }

        private void btnClearText_Click(object sender, EventArgs e)
        {
            ClearText();
        }

        void ClearText()
        {
            rtbResult.ResetText();
        }

        private int FindID()
        {
            int id=1;
            var members = from m in gymDatabaseContext.Members select m;
            foreach(Members m in members)
            {
                if (id <= m.memberId)
                    id = m.memberId + 1;
            }
            return id;
        }

        private void btnDeleteMember_Click(object sender, EventArgs e)
        {
            gymDatabaseContext.Database.ExecuteSqlCommand("DELETE FROM Members WHERE memberId = {0}", txtID.Text);
            MessageBox.Show("Member Deleted!");
        }
    }
}
