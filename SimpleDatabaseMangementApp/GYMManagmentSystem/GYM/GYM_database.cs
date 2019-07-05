namespace GYM
{
    using System;
    using System.Data.Entity;
    using System.ComponentModel.DataAnnotations.Schema;
    using System.Linq;

    public partial class GYM_database : DbContext
    {
        public GYM_database()
            : base("name=GYM_database")
        {
        }

        public virtual DbSet<Bosses> Bosses { get; set; }
        public virtual DbSet<Employees> Employees { get; set; }
        public virtual DbSet<Instructors> Instructors { get; set; }
        public virtual DbSet<Subscriptions> Subscriptions { get; set; }
        public virtual DbSet<sysdiagrams> sysdiagrams { get; set; }
        public virtual DbSet<Workers> Workers { get; set; }
        public virtual DbSet<WorkingFields> WorkingFields { get; set; }
        public virtual DbSet<LoginInfos> LoginInfos { get; set; }
        public virtual DbSet<Members> Members { get; set; }

        protected override void OnModelCreating(DbModelBuilder modelBuilder)
        {
            modelBuilder.Entity<Bosses>()
                .HasMany(e => e.Employees)
                .WithRequired(e => e.Bosses)
                .WillCascadeOnDelete(false);

            modelBuilder.Entity<Employees>()
                .HasOptional(e => e.Instructors)
                .WithRequired(e => e.Employees);

            modelBuilder.Entity<Employees>()
                .HasOptional(e => e.Workers)
                .WithRequired(e => e.Employees);

            modelBuilder.Entity<Instructors>()
                .HasMany(e => e.WorkingFields)
                .WithMany(e => e.Instructors)
                .Map(m => m.ToTable("InstructorsFields").MapLeftKey("employeeId").MapRightKey("workingFieldsId"));

            modelBuilder.Entity<Subscriptions>()
                .HasMany(e => e.Members)
                .WithRequired(e => e.Subscriptions)
                .WillCascadeOnDelete(false);

            modelBuilder.Entity<Workers>()
                .HasMany(e => e.LoginInfos)
                .WithRequired(e => e.Workers)
                .WillCascadeOnDelete(false);
        }
    }
}
